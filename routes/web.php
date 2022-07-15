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

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/authentication', [AuthController::class, 'authentication'])->name('authentication');
Route::get('/', HomeController::class)->name('welcome')->middleware('guest');
Route::get('/home', [SystemController::class, 'index'])->name('home')->middleware('auth');

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

