<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\SystemController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('register', [UserController::class, 'store'])->name('register');
Route::view('registrar', 'register')->name('registrar');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/authentication', [AuthController::class, 'authentication'])->name('authentication');
Route::get('/home', [SystemController::class, 'index'])->name('home')->middleware('auth');

// Reset Password Routes
Route::view('/forgot-password', 'auth.forgot-password')->middleware('guest')->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetPasswordMail'])->middleware('guest')->name('password.email');
Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->middleware('guest')->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetingPassword'])->middleware('guest')->name('password.update');

//export Excel
Route::get('products/export', [ProductController::class, 'export'])->name('products.export')->middleware('auth');


Route::get('/', HomeController::class)->name('welcome')->middleware('guest');
Route::view('/about', 'home.about')->name('about');

//Products
Route::resource('products', ProductController::class)->middleware('auth');

//Providers
Route::resource('providers', ProviderController::class)->middleware(['auth', 'user_role']);

//users
Route::resource('users', UserController::class)->middleware('auth');
Route::put('users/{user}/changepassword', [UserController::class, 'changePassword'])->name('users.changepassword')->middleware('auth');

//Clients
Route::resource('clients', ClientController::class)->middleware('auth');


//sales
Route::resource('sales', SaleController::class)->names('sales')->middleware('auth');
Route::post('{sale}/temporary/{product}', [SaleController::class, 'temporaryProduct'])->name('temporary.store')->middleware('auth');
Route::post('sales/new-sale/{sale}', [SaleController::class, 'newSale'])->name('sale.new')->middleware('auth');
Route::get('/sales/get-client/{client}', [SaleController::class, 'getClient'])->name('sale.client')->middleware('auth');
Route::put('sales/delete/{sale}', [SaleController::class, 'saleDelete'])->name('sale.delete')->middleware('auth');

//Store
Route::get('/store', [StoreController::class, 'index'])->name('store')->middleware('auth');
Route::put('store/update/{store}', [StoreController::class, 'update'])->name('store.update')->middleware('auth');


//Reports
Route::get('sale/report/{sale}', [SaleController::class, 'saleReport'])->name('sale.report')->middleware('auth');

//get product by code
Route::get('/sale/getProduct/{code}', [SaleController::class, 'getProductByCode'])->name('sale.getProduct')->middleware('auth');
Route::post('/sale/save-sale', [SaleController::class, 'createNewSale'])->name('sale.createNewSale')->middleware('auth');
Route::post('/sale/delete-product', [SaleController::class, 'deleteProduct'])->name('sale.deleteProduct')->middleware('auth');
Route::post('/sale/cancel-sales', [SaleController::class, 'cancelSales'])->name('sale.cancelSales')->middleware('auth');

