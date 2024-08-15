<?php

use Domain\User\Actions\Admin\DeleteAdminAction;
use Domain\User\Actions\Admin\GetSelfAdminAction;
use Domain\User\Actions\Admin\UpdateSelfAdminAction;
use Domain\User\Actions\Member\GetSelfMemberAction;
use Domain\User\Actions\Authentication\LogoutAction;
use Domain\User\Actions\Authentication\RefreshAction;
use Domain\User\Actions\Authentication\ResetPasswordAction;
use Illuminate\Support\Facades\Route;

/**
 * Admin areas
 */
Route::prefix('/admin')
    ->middleware('role:admin')
    ->group(function () {
        Route::post('/', RefreshAction::class);
        Route::put('/', UpdateSelfAdminAction::class);
        Route::post('/me', GetSelfAdminAction::class);
        Route::post('/refresh', RefreshAction::class);
        Route::post('/reset-password', ResetPasswordAction::class);
        Route::post('/logout', LogoutAction::class);
        Route::put('/{id}', ResetPasswordAction::class);
        Route::delete('/{id}', DeleteAdminAction::class);
    });

/**
 * Member areas
 */
Route::prefix('/member')
    ->middleware('role:member')
    ->group(function () {
        Route::post('/me', GetSelfMemberAction::class);
        Route::post('/refresh', RefreshAction::class);
        Route::post('/reset-password', ResetPasswordAction::class);
        Route::post('/logout', LogoutAction::class);
    });
