<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware("auth:api")->get("/user", function (Request $request) {
    return $request->user();
});

Route::group(["as" => "api."], function () {
    Orion\Facades\Orion::resource("appointments", App\Http\Api\Appointments::class);
    Orion\Facades\Orion::resource("appointment-methods", App\Http\Api\AppointmentMethods::class);
    Orion\Facades\Orion::resource("appointment-types", App\Http\Api\AppointmentTypes::class);
    Orion\Facades\Orion::resource("clients", App\Http\Api\Clients::class);
    Orion\Facades\Orion::resource("users", App\Http\Api\Users::class);
    Orion\Facades\Orion::resource("roles", App\Http\Api\Roles::class);
});
