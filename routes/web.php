<?php

use Illuminate\Support\Facades\Route;

use Twilio\Rest\Client;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Portal
use App\Models\File;
use Illuminate\Support\Facades\Storage;

Route::post('vapor/signed-storage-url',function(){
    return App\Models\File::signed_transfer();
});

Route::get("/", function () {
    return redirect("/admin");
});

Route::get("/test-prod-logging", function () {
    \Log::error("Prod error");
    \Log::warning("Prod warn");
    \Log::info("Prod info");
});

Route::get("/video-client", function () {
    return view("pages.video-client.client");
});

Route::get("/attend/{session}", App\Http\Livewire\Video\Player::class);

Route::get("/invoice", function () {
    $pdf = App::make("dompdf.wrapper")->setWarnings(true);
    $pdf->loadView("pages.templates.invoice-template");
    return $pdf->stream();
});

// Route::get("/api/users-extend", function () {
//     $user = User::first();
//     $user->data->xero_id = 1;
//     $user->data->xero_name = "test";
//     $user->save();

//     dd($user);
// });

Route::get("/ui/playground", function () {
    return view("pages.playground");
});

Route::get("/version-update", function () {
    foreach (App\Models\User::all() as $user) {
        $user->notify(new \App\Notifications\VersionUpgradeNotification());
    }
});

Route::get("/notification-test", function () {
    User::find(1)->notify(new App\Notifications\Tagged());
});

Route::put("files", "App\Http\Controllers\FilesController@stage");
Route::get("storage/{filename}", "App\Http\Controllers\FilesController@view");

Route::middleware(["auth"])->group(function () {
    // Files

    // Route::resource('files', 'App\Http\Controllers\FilesController');
    Route::get("files/{folder}/create", "App\Http\Controllers\FilesController@create");
    Route::get("files/{file}/remove", "App\Http\Controllers\FilesController@remove");
    Route::match(["get", "post"], "files/{file}/tag", "App\Http\Controllers\FilesController@tag");

    Route::middleware(["password.confirm"])->group(function () {});
});

Route::get("/connect", "\App\Http\Controllers\Authentication\LoginController@app_connect");
Route::post("/connect", "\App\Http\Controllers\Authentication\LoginController@app_connect");

Route::get("/sms", function () {
    $account_sid = env("TWILIO_ACCOUNT_SID");
    $auth_token = env("TWILIO_AUTH_TOKEN");

    // A Twilio number you own with SMS capabilities
    $twilio_number = "CHSCOVID";

    $client = new Client($account_sid, $auth_token);
    $client->messages->create(
        // Where to send a text message (your cell phone?)
        "+61413030759",
        [
            "from" => $twilio_number,
            "body" => "Wed Dec 29 2021 15:44:24 BRADLEY DOB 06/06/1989 COVID-19 virus was NOT detected on your swab collected 28/12/2021 ACT Pathology. You may still need to isolate. Visit act.gov.au/results",
        ]
    );
});
