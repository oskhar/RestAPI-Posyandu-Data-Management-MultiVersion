<?php

use Domain\Admin\Actions\AdminGetSelfAction;
use Domain\Member\Actions\MemberGetSelfAction;
use Domain\User\Actions\LogoutAction;
use Domain\User\Actions\RefreshAction;
use Domain\User\Actions\ResetPasswordAction;
use Illuminate\Support\Facades\Route;

/**
 * Admin areas
 */
Route::prefix("/admin")->group(function () {
    Route::post('/me', AdminGetSelfAction::class);
    Route::post('/refresh', RefreshAction::class);
    Route::post('/reset-password', ResetPasswordAction::class);
    Route::post('/logout', LogoutAction::class);
});

/**
 * Member areas
 */
Route::prefix("/member")->group(function () {
    Route::post('/me', MemberGetSelfAction::class);
    Route::post('/refresh', RefreshAction::class);
    Route::post('/reset-password', ResetPasswordAction::class);
    Route::post('/logout', LogoutAction::class);
});
