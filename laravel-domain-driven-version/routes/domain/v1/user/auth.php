<?php

use Domain\Admin\Actions\GetSelfAdminAction;
use Domain\Member\Actions\GetSelfMemberAction;
use Domain\User\Actions\LogoutAction;
use Domain\User\Actions\RefreshAction;
use Domain\User\Actions\ResetPasswordAction;
use Illuminate\Support\Facades\Route;

/**
 * Admin areas
 */
Route::prefix("/admin")->group(function () {
    Route::post('/me', GetSelfAdminAction::class);
    Route::post('/refresh', RefreshAction::class);
    Route::post('/reset-password', ResetPasswordAction::class);
    Route::post('/logout', LogoutAction::class);
});

/**
 * Member areas
 */
Route::prefix("/member")->group(function () {
    Route::post('/me', GetSelfMemberAction::class);
    Route::post('/refresh', RefreshAction::class);
    Route::post('/reset-password', ResetPasswordAction::class);
    Route::post('/logout', LogoutAction::class);
});
