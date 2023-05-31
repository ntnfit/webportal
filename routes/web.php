<?php

use Illuminate\Support\Facades\Http;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/orders-list', function () {
    return view('orders.list');
});

Route::get('/contract', function () {
    return view('contract.form');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/custom-login', [App\Http\Controllers\CustomAuthController::class, 'customLogin'])->name('customLogin');

Auth::routes();

// Users management
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
Route::get('/users/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::put('/users/update/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::put('/users/update-password/{id}', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('users.updatePassword');
Route::get('/users/create', [App\Http\Controllers\UserController::class, 'showCreate'])->name('users.showCreate');
Route::post('/users/insert', [App\Http\Controllers\UserController::class, 'insert'])->name('users.insert');

// Purchasing management
Route::get('/purchasing', [App\Http\Controllers\PurchasingController::class, 'index'])->name('purchasing');
Route::get('/purchasing/create', [\App\Http\Controllers\PurchasingController::class, 'create'])->name('purchasing.create');
Route::post('/purchasing/insert', [App\Http\Controllers\PurchasingController::class, 'insert'])->name('purchasing.insert');

// Items management
Route::get('/items', [App\Http\Controllers\ItemController::class, 'index'])->name('items');
Route::get('/items/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit'])->name('items.edit');
Route::get('/items/show-create', [App\Http\Controllers\ItemController::class, 'showCreate'])->name('items.showCreate');
Route::post('/items/insert', [App\Http\Controllers\ItemController::class, 'insert'])->name('items.insert');
Route::put('/items/update/{id}', [App\Http\Controllers\ItemController::class, 'update'])->name('items.update');


Route::get('/sales', [App\Http\Controllers\SalesController::class, 'index'])->name('sales');
Route::get('/fix-asset', [App\Http\Controllers\FixAssetController::class, 'index'])->name(('fix-asset'));

Route::get('/netsuite/customers', [App\Http\Controllers\NetSuiteController::class, 'lookupCustomer'])->name('lookupCustomer');
Route::get('/netsuite/all-customers', [App\Http\Controllers\NetSuiteController::class, 'getAllCustomer'])->name('customers');
