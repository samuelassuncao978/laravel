<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\File;
use Illuminate\Support\Facades\Storage;

class GenerateFilePreview implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $file;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(File $file)
    {
        //
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        switch ($this->file->mime) {
            case "image/gif":
            case "image/jpeg":
            case "image/png":
                $this->thumbnails();
                break;
            case "application/pdf":
                $this->thumbnails();
                $this->pages();
                break;
        }
    }

    public function thumbnails()
    {
        $raw_file = new \imagick();

        $raw_file->readImageBlob(Storage::get("public/" . $this->file->id));

        $this->file->meta = [
            "thumbnails" => [
                "xs" => $this->thumbnail($raw_file, "xs"),
                "sm" => $this->thumbnail($raw_file, "sm"),
                "md" => $this->thumbnail($raw_file, "md"),
            ],
        ];
        $this->file->save();
    }

    public function thumbnail($imagick, $size)
    {
        $image = clone $imagick;
        $thumbnail = $image->getImage();
        $thumbnail->setImageFormat("jpg");
        switch ($size) {
            case "xs":
                $thumbnail->thumbnailImage(25, 25, true, true);
                break;
            case "sm":
                $thumbnail->thumbnailImage(150, 150, true, true);
                break;
            case "md":
                $thumbnail->thumbnailImage(350, 350, true, true);
                break;
        }

        Storage::put("/public/" . $this->file->id . "-" . $size, $thumbnail->getimageblob());
        return $this->file->id . "-" . $size;
    }

    public function pages()
    {
        $raw_file = new \imagick();
        $raw_file->readImageBlob(Storage::get("public/" . $this->file->id));
        $pages = [];
        for ($i = 0; $i < $raw_file->getNumberImages(); $i++) {
            $pages[] = $this->page($raw_file, $i);
        }
        $this->file->meta = array_merge($this->file->meta, [
            "clips" => $pages,
        ]);
        $this->file->save();
    }

    public function page($imagick, $page)
    {
        $image = clone $imagick;
        $image->setIteratorIndex($page);
        $image = $image->getImage();
        $image->setImageFormat("jpg");
        Storage::put("/public/" . $this->file->id . "-page-" . $page, $image->getimageblob());
        return $this->file->id . "-page-" . $page;
    }
}
