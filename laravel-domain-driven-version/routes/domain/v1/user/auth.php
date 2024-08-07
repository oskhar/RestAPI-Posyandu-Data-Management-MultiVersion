<?php

use Domain\User\Actions\AuthenticationAdminAction;
use Illuminate\Support\Facades\Route;

/**
 * Admin area
 */
Route::prefix("/admin")->group(function () {
    Route::post('/me', AuthenticationAdminAction::class);
});
