<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;

/**
 *
 */
class AuthenticationController extends Controller
{
    /**
     * Verify
     * Prompt user to verify email
     *
     * @group  User authentication
     *
     * @param  \Illuminate\Http\Request  $request
     * @bodyParam  book.name string
     * @bodyParam  book.author_id integer required Blah blah blah
     *
     * @response {
     *  "id": 4,
     *  "name": "Jessica Jones",
     *  "roles": ["admin"]
     * }
     * @response 404 {
     *  "message": "No query results for model [\App\User]"
     * }
     *
     * @return \Illuminate\Http\Response
     */
    public function verify_email(Request $request, $id = null, $hash = null)
    {
        if ($request->isMethod("post")) {
            $request->user()->sendEmailVerificationNotification();
            return view("pages.authentication.verify-email")->with("status", "verification-link-sent");
        }

        return $request->user()->hasVerifiedEmail() ? redirect()->intended(RouteServiceProvider::HOME) : view("pages.authentication.verify-email");
    }

    /**
     * Prompt user to verify email
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verify(Request $request, $id = null, $hash = null)
    {
        if (!hash_equals((string) $id, (string) $request->user()->getKey())) {
            return false;
        }

        if (!hash_equals((string) $hash, sha1($request->user()->getEmailForVerification()))) {
            return false;
        }

        return true;
    }
}
