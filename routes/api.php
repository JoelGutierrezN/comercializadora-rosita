<?php

use App\Http\Controllers\api\v1\ProductController;
use Illuminate\Support\Facades\Route;

Route::apiResource('products', ProductController::class);

Route::get('images/{image}', [ProductController::class, 'getImage'])->name('images.show');


