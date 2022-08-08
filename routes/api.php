<?php

use App\Http\Controllers\api\v1\auth\UserTokenController;
use App\Http\Controllers\api\v1\ClientController;
use App\Http\Controllers\api\v1\ProductController;
use App\Http\Controllers\api\v1\ProviderController;
use App\Http\Controllers\api\v1\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResource('products', ProductController::class);
Route::apiResource('providers', ProviderController::class);
Route::apiResource('clients', ClientController::class);
Route::apiResource('users', UserController::class);

Route::post('login', UserTokenController::class);

Route::get('images/{image}', [ProductController::class, 'getImage'])->name('images.show');


