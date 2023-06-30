<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

// Models
use App\Models\Folder;
use App\Models\File;

class FilesController extends Controller
{
    public function stage(Request $request)
    {
        if (File::driver() === "local") {
            $file = file_get_contents("php://input");
            Storage::disk("local")->put("tmp/" . $request->header("uuid"), $file);
            return true;
        } else {
            return abort("404");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request, $filename)
    {
        $clips = ["-xs", "-sm", "-md", "-page"];
        if (File::driver() === "local") {
            $id = str_replace($clips, "", Str::beforeLast($filename, "-page"));
            if ($file = File::find($id)) {
                $thumbnail = Str::contains(Str::beforeLast($filename, "-page"), $clips) ? Str::afterLast($filename, "-") : null;
                $page = Str::contains($filename, "-page") ? Str::afterLast($filename, "-page-") : null;

                if ($file->renderable()) {
                    return $file->stream($thumbnail ? "thumbnail" : (!is_null($page) ? "page" : null), $thumbnail ?? $page);
                } else {
                    return $file->download($thumbnail ? "thumbnail" : (!is_null($page) ? "page" : null), $thumbnail ?? $page);
                }
            }
        }
        return abort("404");
    }
}
