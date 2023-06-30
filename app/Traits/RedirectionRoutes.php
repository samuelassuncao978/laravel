<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait RedirectionRoutes
{
    public function route($route = "", $data)
    {
        $request = request();
        if (optional($request)->url_successful) {
            $route = optional($request)->url_successful;
        }

        $route = Str::of($route)->replaceMatches("/\[(.*?)\]/", function ($match) use ($data) {
            return optional($data)[$match[1]];
        });

        return redirect($route);
    }
}
