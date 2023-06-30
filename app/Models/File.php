<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

// Models
use App\Models\File;
use App\Models\Tag;
use App\Models\User;
use App\Models\Client;
use App\Models\Appointment;

// Pivots
use App\Models\Pivots\FileFolder;
use App\Models\Pivots\FileTag;
use App\Models\Pivots\UserFile;
use App\Models\Pivots\ClientFile;
use App\Models\Pivots\AppointmentFile;

// Traits
use App\Traits\UsesUuid;
use App\Traits\ScopeOwned;

class File extends Model
{
    use UsesUuid, ScopeOwned, SoftDeletes;

    protected $table = "files";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = ["id", "name", "mime", "size", "meta"];

    protected $casts = [
        "meta" => "json",
    ];

    protected static function booted()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!optional($model)->size) {
                $model->size = Storage::size("public/" . $model->id);
            }
            if (!optional($model)->mime) {
                $mimetypes = new \GuzzleHttp\Psr7\MimeType();
                $model->mime = $mimetypes::fromFilename($model->name);
            }
        });
        static::deleting(function ($model) {
            if ($model->isForceDeleting()) {
                try {
                    if (!Storage::delete("archived/" . $model->id)) {
                        return false;
                    }
                } catch (\Exception $e) {
                }
            } else {
                try {
                    if (!Storage::copy("public/" . $model->id, "archived/" . $model->id)) {
                        return false;
                    }
                } catch (\Exception $e) {
                }
            }
        });
    }

    public function users()
    {
        return $this->belongsToMany(User::class, UserFile::class);
    }

    public function clients()
    {
        return $this->belongsToMany(Client::class, ClientFile::class);
    }

    public function appointments()
    {
        return $this->belongsToMany(Appointment::class, AppointmentFile::class);
    }

    public function folders()
    {
        return $this->belongsToMany(Folder::class, FileFolder::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, FileTag::class);
    }

    public function renderable()
    {
        switch ($this->mime) {
            case "application/pdf":
                // pdf
                return true;
                break;
            case "image/gif":
            case "image/jpeg":
            case "image/png":
                // image
                return true;
                break;
        }
        return false;
    }

    public function getPreviewAttribute()
    {
        if ($this->renderable()) {
            return $this->url("public/" . $this->id . "-xs", true);
        }
        return null;
    }

    public function uri($public = false, $clip = null)
    {
        if ($this->exists) {
            return $this->get("public/" . $this->id);
        }
        return null;
    }

    public function thumbnail($size = "sm")
    {
        if ($this->exists) {
            if (optional(optional($this->meta)["thumbnails"])[$size]) {
                return $this->get("public/" . $this->id . "-" . $size, "image/jpeg");
            }
        }
        return null;
    }

    public function pages()
    {
        if ($this->exists) {
            if (optional($this->meta)["clips"]) {
                return collect(optional($this->meta)["clips"])->map(function ($page) {
                    return $this->get("public/" . $page, "image/jpeg");
                });
            }
        }
        return [];
    }

    public function get($filename, $mime = null)
    {
        if ($this->driver() === "s3") {
            return cache()->remember("file-url:" . $filename, 60 * 15, function () use ($filename, $mime) {
                return Storage::temporaryUrl($filename, now()->addMinutes(15), [
                    "ResponseContentType" => $mime ?? $this->mime,
                    "ResponseContentDisposition" => "inline; filename=" . $this->name,
                ]);
            });
        } else {
            return cache()->remember("file-url:" . $filename, 60 * 15, function () use ($filename) {
                return Storage::url($filename);
            });
        }
    }

    public function getOrientationAttribute()
    {
        switch ($this->mime) {
            case "image/gif":
            case "image/jpeg":
            case "image/png":
                return "landscape";
                break;
        }
        return "portrait";
    }

    public static function driver()
    {
        return config("filesystems.default");
    }

    public function url($file = null, $preview = false)
    {
        if ($this->exists) {
            if ($this->driver() === "s3") {
                return Storage::temporaryUrl($file ?? "public/" . $this->id, now()->addMinutes(15), [
                    "ResponseContentType" => $preview ? "image/jpeg" : $this->mime,
                    "ResponseContentDisposition" => "inline; filename=" . $this->name,
                ]);
            } else {
                return Storage::url($file ?? "public/" . $this->id);
            }
        }
        return null;
    }

    public function persist($unmetered = false)
    {
        if (!$unmetered) {
            if (
                Storage::size("tmp/" . $this->id) >
                auth()
                    ->user()
                    ->storage()["available"]
            ) {
                // $this->addError("server-error", "You have ran out of enought storage space to store this file.");
                return false;
            }
        }
        if (Storage::copy("tmp/" . $this->id, "public/" . $this->id)) {
            $original = $this->original;
            $this->save();
            if (!empty(optional($original)["id"]) && $original["id"] !== $this->id) {
                // Keep a copy of the original. But mark as deleted.
                File::create($original)->delete();
            }
            return true;
        } else {
            abort(500);
        }
        return false;
    }

    public function stream($type = null, $clip = null)
    {
        if ($type === "thumbnail") {
            $file = Storage::get($file ?? "public/" . $this->id . (!is_null($clip) ? "-" . $clip : ""));
            $response = response()->make($file, 200);
            $response->header("Content-Type", "image/jpeg");
        } elseif ($type === "page") {
            $file = Storage::get($file ?? "public/" . $this->id . (!is_null($clip) ? "-page-" . $clip : ""));
            $response = response()->make($file, 200);
            $response->header("Content-Type", "image/jpeg");
        } else {
            $file = Storage::get($file ?? "public/" . $this->id);
            $response = response()->make($file, 200);
            $response->header("Content-Type", $this->mime);
        }
        $response->header("Content-Disposition", "inline; filename=" . $this->name);
        return $response;
    }

    public function download($type = null, $clip = null)
    {
        if ($type === "thumbnail") {
            $file = Storage::get($file ?? "public/" . $this->id . ($clip ? "-" . $clip : ""));
            $response = response()->make($file, 200);
            $response->header("Content-Type", "image/jpeg");
        } elseif ($type === "page") {
            $file = Storage::get($file ?? "public/" . $this->id . ($clip ? "-page-" . $clip : ""));
            $response = response()->make($file, 200);
            $response->header("Content-Type", "image/jpeg");
        } else {
            $file = Storage::get($file ?? "public/" . $this->id);
            $response = response()->make($file, 200);
            $response->header("Content-Type", $this->mime);
        }
        $response->header("Content-Disposition", "attachment; filename=" . $this->name);
        return $response;
    }

    public static function signed_transfer()
    {
        $uuid = Str::uuid();
        $location = "tmp";
        $expires = "+20 minutes";
        $driver = self::driver();
        if ($driver === "local") {
            return [
                "uuid" => $uuid,
                "bucket" => "",
                "key" => "$location/$uuid",
                "url" => url("/files"),
                "headers" => [
                    "uuid" => $uuid,
                ],
            ];
        } elseif ($driver === "s3") {
            $adapter = Storage::disk("s3")->getAdapter();
            $client = $adapter->getClient();
            $bucket = $adapter->getBucket();

            $cmd = $client->getCommand("PutObject", [
                "Bucket" => $bucket,
                "Key" => "$location/$uuid",
                "ACL" => "public-read",
            ]);
            // Get the presigned request
            $request = $client->createPresignedRequest($cmd, $expires);

            return [
                "uuid" => $uuid,
                "bucket" => $bucket,
                "key" => "$location/$uuid",
                "url" => (string) $request->getUri(),
                "headers" => [
                    "uuid" => $uuid,
                ],
            ];
        }
    }
}
