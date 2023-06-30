<?php

use App\Http\Controllers\CalendarWebhookController;

Route::prefix("/admin")->group(function () {
    Route::post("calendar/{calendar}/watching/webhook", CalendarWebhookController::class)->name("admin.calendar.watching.webhook");

    Route::middleware(["auth:admin"])->group(function () {
        Route::get("/", App\Http\Livewire\Admin\Dashboard\Index::class);
        Route::get("/calendar", App\Http\Livewire\Admin\Calendar\Index::class);
        Route::get("/calendar/authorize", App\Http\Livewire\Admin\Calendar\Authorize::class);
        Route::get("/files", App\Http\Livewire\Admin\Files\Index::class);
        Route::get("/employers/{employer?}", App\Http\Livewire\Admin\Employers\Index::class);
        Route::get("/clients/{client?}", App\Http\Livewire\Admin\Clients\Index::class);
        Route::get("/users/{user?}", App\Http\Livewire\Admin\Users\Index::class);
        Route::get("/settings", App\Http\Livewire\Admin\Settings\Index::class);
        Route::get("/reports", App\Http\Livewire\Admin\Reports\Index::class);
        Route::get("/tenants/{tenant?}", App\Http\Livewire\Admin\Tenants\Index::class);
    });

    Route::post("/calendar/authorize", App\Http\Livewire\Admin\Calendar\Authorize::class)
        ->middleware("oauth")
        ->withoutMiddleware([\App\Http\Middleware\Tenant::class, \App\Http\Middleware\EncryptCookies::class, \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class, \Illuminate\Session\Middleware\StartSession::class, \Illuminate\Session\Middleware\AuthenticateSession::class, \Illuminate\View\Middleware\ShareErrorsFromSession::class, \App\Http\Middleware\VerifyCsrfToken::class, \Illuminate\Routing\Middleware\SubstituteBindings::class]);

    Route::middleware(["guest:admin"])->group(function () {
        Route::get("/login", App\Http\Livewire\Admin\Authentication\Login::class)->name("admin.login");
        Route::get("/forgot", App\Http\Livewire\Admin\Authentication\Forgot::class);
        Route::get("/reset/{token}", App\Http\Livewire\Admin\Authentication\Reset::class)->name("admin.reset");
    });

    Route::get("/support", App\Http\Livewire\Admin\Support\Index::class);
    Route::get("/terms-of-service", App\Http\Livewire\Admin\TermsOfService\Index::class);
});

Route::get("/register", App\Http\Livewire\Tenants\Authentication\Register::class);
