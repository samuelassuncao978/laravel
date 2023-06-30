<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

use App\Jobs\RevokeTemporaryDatabaseUser;

class Connection extends Model
{
    protected $primaryKey = "database";
    protected $keyType = "string";

    protected $fillable = ["driver", "host", "port", "database", "username", "password", "unix_socket", "charset", "collation", "prefix", "prefix_indexes", "strict", "engine", "options"];

    public function save($options = [])
    {
        $default = config("database.connections.central");
        $this->managed = optional($this)->managed ?? config("tenants.database-managed");

        if (isset($this->managed) && $this->managed === true) {
            /* If database is managed set default missing config */
            $auto_database = (string) Str::limit(Str::of(Str::uuid())->replace("-", ""), 12, "");
            $auto_username = Str::limit($auto_database, 6, "-") . time();
            $auto_password = md5(encrypt($auto_database));
            $this->fill(array_merge($default, $this->attributes, empty($this->attributes["database"]) ? ["database" => $auto_database] : [], empty($this->attributes["username"]) ? ["username" => $auto_username] : [], empty($this->attributes["password"]) ? ["password" => $auto_password] : []));
            if ($this->attributes["driver"] === "mysql") {
                if (function_exists("mysql")) {
                    $database = mysql()
                        ->databases()
                        ->firstOrCreate([
                            "database" => $this->attributes["database"],
                        ]);
                    $database->users()->create([
                        "username" => $this->attributes["username"],
                        "password" => $this->attributes["password"],
                        "database" => $this->attributes["database"],
                    ]);
                }
            } elseif ($this->attributes["driver"] === "sqlite") {
                ($fh = fopen(storage_path("app/databases/" . $this->attributes["database"] . ".sqlite"), "w")) or die("can't create DB");
                $this->attributes["database"] = "app/databases/" . $this->attributes["database"] . ".sqlite";
            }
        }
        return false;
    }

    public static function create($attributes = [])
    {
        $instance = new static();
        $model = $instance->fill($attributes);
        $model->save();
        return $model;
    }

    public function delete($options = [])
    {
        if (isset($this->managed) && $this->managed === true) {
            if (function_exists("mysql")) {
                $database = mysql()
                    ->databases()
                    ->find($this->attributes["database"]);
                $database
                    ->users()
                    ->get()
                    ->map(function ($user) {
                        $user->delete();
                    });
                $database->delete();
            }
        }
        return $this;
    }

    public static function get()
    {
    }

    public function find($id)
    {
    }

    public function available()
    {
        $connection = $this->toArray();
        if ($connection["driver"] === "sqlite") {
            $connection["database"] = storage_path($connection["database"]);
        }
        config(["database.connections.testavailable" => $connection]);
        try {
            \DB::connection("testavailable")->getPdo();
            \DB::purge("testavailable");
            return true;
        } catch (\Exception $e) {
            \DB::purge("testavailable");

            return false;
        }
    }

    public function access()
    {
        $env = app()->environment();

        /* Creates temporary database user. */
        $id = (string) Str::of(Str::uuid())->replace("-", "");

        $username = Str::limit($id, 6, "-") . time();
        $password = md5($id);

        $isDevelopment = $this->host === "database";

        $host = $isDevelopment ? "127.0.0.1" : $this->host;
        $port = $isDevelopment ? optional(optional(optional(json_decode(optional(getenv())["LANDO_INFO"]))->database)->external_connection)->port : $this->port;

        if (!$isDevelopment) {
            $user = [
                "username" => $username,
                "password" => $password,
                "database" => $this->database,
            ];
            mysql()
                ->users()
                ->create($user);

            RevokeTemporaryDatabaseUser::dispatch($user)->delay(now()->addMinutes(5));
        } else {
            // Local development - use root account
            $user = [
                "username" => config("database.connections.central.username"),
                "password" => config("database.connections.central.password"),
                "database" => $this->database,
            ];
        }

        return "mysql://" . $user["username"] . ":" . $user["password"] . "@{$host}:{$port}/{$this->database}?enviroment={$env}&name={$this->database}";
    }
}
