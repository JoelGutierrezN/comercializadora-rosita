<?php

use App\Http\Controllers\api\v1\ProductController;
use Illuminate\Support\Facades\Route;

Route::apiResource('products', ProductController::class);


