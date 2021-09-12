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

Route::group(['prefix' => '/admin', 'middleware' => 'auth'], function() {
    Route::get('news/create', [Controllers\Admin\NewsController::class, 'add'])->name('admin.news.add');
    Route::post('news/create', [Controllers\Admin\NewsController::class, 'create'])->name('admin.news.create');
    Route::get('news/edit/{news_id}', [Controllers\Admin\NewsController::class, 'edit'])->name('admin.news.edit');
    Route::post('news/edit', [Controllers\Admin\NewsController::class, 'update'])->name('admin.news.update');
    Route::get('news', [Controllers\Admin\NewsController::class, 'index'])->name('admin.news.index');
    Route::get('delete', [Controllers\Admin\NewsController::class, 'delete'])->name('admin.news.delete');

    Route::get('profile/create', [Controllers\Admin\ProfileController::class, 'add']);
    Route::post('profile/create', [Controllers\Admin\ProfileController::class, 'create'])
        ->name('admin.profile.create');
    Route::get('profile/edit', [Controllers\Admin\ProfileController::class, 'edit']);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
