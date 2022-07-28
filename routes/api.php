<?php

use App\Http\Controllers\api\v1\ProductController;
use App\Http\Controllers\api\v1\ProviderController;
use Illuminate\Support\Facades\Route;

Route::apiResource('products', ProductController::class);
Route::apiResource('providers', ProviderController::class)->only('index');

Route::get('images/{image}', [ProductController::class, 'getImage'])->name('images.show');


