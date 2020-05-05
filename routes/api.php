<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PermissionRoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PrefectureController;
use App\Http\Controllers\DashboardController;
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
    Route::apiResource('categories', CategoryController::class);
    Route::get('dashboards', [DashboardController::class, 'index']);
    Route::apiResource('prefectures', PrefectureController::class)->only('index');
    Route::apiResource('users', UserController::class);
    Route::apiResource('admins', AdminController::class);
    Route::apiResource('companies', CompanyController::class);
    Route::apiResource('contacts', ContactController::class)->only('index', 'show');
    Route::apiResource('posts', PostController::class);
    Route::apiResource('permissions', PermissionController::class);
    Route::apiResource('roles', RoleController::class);
    Route::apiResource('roles.permissions', PermissionRoleController::class)->only('index', 'store');
    Route::apiResource('admins.roles', AdminRoleController::class)->only('store');
    Route::match(['PUT', 'PATCH', 'POST'], 'assets/upload', [AssetController::class, 'upload']);
    Route::get('assets', [AssetController::class, 'index']);
});
