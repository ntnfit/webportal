<?php

  
use Illuminate\Support\Facades\Route;
  
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfilesController;
use App\Http\Middleware\CheckStatus;
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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth',CheckStatus::class]], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //users
    Route::patch('/profile', [ProfilesController::class, 'update'])->name('profile.update');
    Route::patch('/resetpass', [ProfilesController::class, 'updatepass'])->name('profile.updatepass');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::get('/netsuite/customers', [App\Http\Controllers\NetSuiteController::class, 'lookupCustomer'])->name('lookupCustomer');
    Route::get('/netsuite/all-customers', [App\Http\Controllers\NetSuiteController::class, 'getAllCustomer'])->name('customers');

    Route::get('/', function () {
        return redirect()->route('home');;
    });

    Route::get('/orders-list', function () {
        return view('orders.list');
    });

    Route::get('/contract', function () {
        return view('contract.index');
    });
    // notification
    Route::get(
        'notifications/get',
        [App\Http\Controllers\NotificationsController::class, 'getNotificationsData']
    )->name('notifications.get');
});