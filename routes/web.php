<?php

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

Route::redirect('/', '/login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // middleware admin

    Route::name('admin.')->prefix('admin/')->group(function () {
        Route::view('/categories', 'pages.admin.categories')->name('categories');
        Route::view('/products', 'pages.admin.products')->name('products');
        Route::view('/users', 'pages.admin.users')->name('users');

    });


    // end middleware admin

    Route::view('/dashboard', 'pages.dashboard')->name('dashboard');
    Route::view('/totens', 'pages.totens')->name('totens');

});
