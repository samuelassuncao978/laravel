<?php

Route::prefix("/organization")->group(function () {
    Route::middleware(["auth:organization"])->group(function () {
        Route::get("/", App\Http\Livewire\Organization\Index::class)->name("organization.home");
    });
    Route::middleware(["guest:organization"])->group(function () {
        Route::get("/login", App\Http\Livewire\Organization\Authentication\Login::class)->name("organization.login");
    });
});
