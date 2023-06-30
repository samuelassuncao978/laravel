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

// Notifications
use App\Notifications\WelcomeNotification;

class RegistrationController extends Controller
{
    /**
     * Registration
     * Register a user account
     *
     * @group Authentication\Registration
     * @unauthenticated
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        if ($request->isMethod("post")) {
            $request->validate([
                "name" => "required|string|max:255",
                "email" => "required|string|email|max:255|unique:users",
                "password" => "required|string|confirmed|min:8",
            ]);

            Auth::login(
                $user = User::create([
                    "name" => $request->name,
                    "email" => $request->email,
                    "password" => Hash::make($request->password),
                ])
            );

            $user->notify(new WelcomeNotification());

            event(new Registered($user));

            return redirect(RouteServiceProvider::HOME);
        }

        return view("pages.authentication.register");
    }

    /**
     * Registration // verification
     * Account verification needs to be complete
     *
     * @group Authentication\Registration
     * @authenticated
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verification(Request $request, $id = null, $hash = null)
    {
        if ($request->isMethod("post")) {
            $request->user()->sendEmailVerificationNotification();
            return view("pages.authentication.verify-email")->with("status", "verification-link-sent");
        }

        return $request->user()->hasVerifiedEmail() ? redirect()->intended(RouteServiceProvider::HOME) : view("pages.authentication.verify-email");
    }

    /**
     * Registration // verify
     * Account verification
     *
     * @group Authentication\Registration
     * @authenticated
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME . "?verified=1");
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect()->intended(RouteServiceProvider::HOME . "?verified=1");
    }
}
