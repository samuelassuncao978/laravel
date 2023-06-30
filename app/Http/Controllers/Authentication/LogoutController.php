<?php

namespace App\Http\Controllers\Authentication;

use Illuminate\Http\Request;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Auth\Events\Registered;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;

use App\Models\User;

use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    /**
     * Logout // current device
     * Destroy an authenticated session for the current device
     *
     * @group Authentication\Logout
     * @authenticated
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout_current_device(Request $request)
    {
        Auth::guard("web")->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/");
    }

    /**
     * Logout // other devices
     * Destroy all other authenticated sessions for this user.
     *
     * @group Authentication\Logout
     * @authenticated
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout_other_devices(Request $request)
    {
        Auth::logoutOtherDevices($request->password);
    }
}
