<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Events\Users\Video\Calling;
use App\Events\Users\Video\Accepted;

class VideoClientController extends Controller
{
    public function call_user(Request $request)
    {
        $signal = $request->signal_data;

        $host = auth()->user()->id;
        $user = User::find(2);

        broadcast(new Calling($user, $host, $signal))->toOthers();
    }

    public function accept_call(Request $request)
    {
        $data["signal"] = $request->signal;
        $data["to"] = $request->to;
        $data["type"] = "callAccepted";
        broadcast(new StartVideoChat($data))->toOthers();
    }
}
