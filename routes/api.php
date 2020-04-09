<?php

use App\Domain\Auth\Controllers\AdminController;
use App\Domain\Auth\Controllers\AdminRoleController;
use App\Domain\Auth\Controllers\AuthController;
use App\Domain\Auth\Controllers\ProfileController;
use App\Domain\Auth\Controllers\UserController;
use App\Domain\Companies\Controllers\CompanyController;
use App\Domain\Posts\Controllers\PostController;
use App\Domain\Shared\Controllers\ContactController;
use App\Domain\Shared\Controllers\PrefectureController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function () {
    Route::post('{guard}/login', [AuthController::class, 'login']);
    Route::delete('{guard}/logout', [AuthController::class, 'logout']);
    Route::get('{guard}/refresh', [AuthController::class, 'refresh']);
    Route::get('profile', [ProfileController::class, 'show']);
    Route::put('profile', [ProfileController::class, 'update']);
});

Route::middleware('auth:admin,user')->group(function () {
    Route::apiResource('prefectures', PrefectureController::class)->only('index');
    Route::apiResource('users', UserController::class);
    Route::apiResource('admins', AdminController::class);
    Route::apiResource('companies', CompanyController::class);
    Route::apiResource('contacts', ContactController::class)->only('index', 'show');
    Route::apiResource('posts', PostController::class);
    Route::match(['PUT', 'PATCH'], 'admins/{admin}/roles', [AdminRoleController::class, 'update']);
});
