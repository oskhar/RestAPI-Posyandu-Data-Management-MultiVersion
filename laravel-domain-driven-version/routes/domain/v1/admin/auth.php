<?php

use Domain\Admin\Actions\DeleteAdminAction;
use Domain\User\Actions\RefreshAction;
use Domain\User\Actions\ResetPasswordAction;
use Illuminate\Support\Facades\Route;

/**
 * Admin areas
 */
Route::prefix("/admin")->group(function () {
    Route::post('/', RefreshAction::class);
    Route::put('/{id}', ResetPasswordAction::class);
    Route::delete('/{id}', DeleteAdminAction::class);
});
