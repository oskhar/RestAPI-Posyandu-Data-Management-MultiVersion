<?php

use Domain\User\Actions\AdminLoginAction;
use Domain\User\Actions\MemberLoginAction;
use Illuminate\Support\Facades\Route;

/**
 * Admin areas
 */
Route::prefix("/admin")->group(function () {
    Route::post('/login', AdminLoginAction::class);
});

/**
 * Member areas
 */
Route::prefix("/member")->group(function () {
    Route::post('/login', MemberLoginAction::class);
});
