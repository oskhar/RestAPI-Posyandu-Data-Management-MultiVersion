<?php

use Domain\Admin\Actions\GetAllAdminAction;
use Domain\User\Actions\AdminLoginAction;
use Illuminate\Support\Facades\Route;

/**
 * Admin areas
 */
Route::prefix("/admin")->group(function () {
    Route::get('/', GetAllAdminAction::class);
});
