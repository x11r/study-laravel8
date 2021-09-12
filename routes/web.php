<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers;

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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('news/create', [Controllers\Admin\NewsController::class, 'create']);
    Route::get('news/{news_id}/edit', [Controllers\Admin\NewsController::class, 'edit']);

    Route::get('profile/create', [Controllers\Admin\ProfileController::class, 'create']);
    Route::get('profile/edit', [Controllers\Admin\ProfileController::class, 'edit']);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
