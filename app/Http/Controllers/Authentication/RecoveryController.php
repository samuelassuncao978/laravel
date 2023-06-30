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

class RecoveryController extends Controller
{
    /**
     * Recovery // standard
     * Recovery account by email
     *
     * @group Authentication\Recovery
     * @unauthenticated
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function recover(Request $request)
    {
        if ($request->isMethod("post")) {
            $request->validate([
                "email" => "required|email",
            ]);

            $status = Password::sendResetLink($request->only("email"));

            return $status == Password::RESET_LINK_SENT
                ? back()->with("status", __($status))
                : back()
                    ->withInput($request->only("email"))
                    ->withErrors(["email" => __($status)]);
        }
        return view("pages.authentication.forgot-password");
    }

    /**
     * Recovery // reset
     * Recovery account by email
     *
     * @group Authentication\Recovery
     * @unauthenticated
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reset(Request $request)
    {
        if ($request->isMethod("post")) {
            $request->validate([
                "token" => "required",
                "email" => "required|email",
                "password" => "required|string|confirmed|min:8",
            ]);

            // Here we will attempt to reset the user's password. If it is successful we
            // will update the password on an actual user model and persist it to the
            // database. Otherwise we will parse the error and return the response.
            $status = Password::reset($request->only("email", "password", "password_confirmation", "token"), function ($user) use ($request) {
                $user
                    ->forceFill([
                        "password" => Hash::make($request->password),
                        "remember_token" => Str::random(60),
                    ])
                    ->save();

                event(new PasswordReset($user));
            });

            // If the password was successfully reset, we will redirect the user back to
            // the application's home authenticated view. If there is an error we can
            // redirect them back to where they came from with their error message.
            return $status == Password::PASSWORD_RESET
                ? redirect()
                    ->route("login")
                    ->with("status", __($status))
                : back()
                    ->withInput($request->only("email"))
                    ->withErrors(["email" => __($status)]);
        }
        return view("pages.authentication.reset-password", [
            "request" => $request,
        ]);
    }
}
