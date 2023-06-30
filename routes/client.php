<?php

Route::prefix("/portal")->group(function () {
    Route::middleware(["auth:client"])->group(function () {
        Route::get("/", App\Http\Livewire\Portal\Index::class)->name("client.home");
        Route::get("/appointments", App\Http\Livewire\Portal\Appointments\Index::class);
        Route::get("/homework", App\Http\Livewire\Portal\Homework\Index::class);
        Route::get("/catalog", App\Http\Livewire\Portal\Catalog::class);
    });
    Route::middleware(["guest:client"])->group(function () {
        Route::get("/login", App\Http\Livewire\Portal\Authentication\Login::class)->name("client.login");
        Route::get("/forgot", App\Http\Livewire\Portal\Authentication\Forgot::class)->name("client.forgot");
        Route::get("/reset", App\Http\Livewire\Portal\Authentication\Reset::class)->name("client.reset");
        Route::get("/register", App\Http\Livewire\Portal\Authentication\Register::class);
    });
});
