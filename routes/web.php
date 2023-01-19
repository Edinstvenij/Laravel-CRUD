<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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
    return view('index');
})->name('index');

Route::prefix('users')->controller(UserController::class)->group(function () {
    Route::get('trash', 'trash')->name('users.trash');
    Route::get('force-delete/{id}', 'forceDelete')->name('users.forceDelete')
        ->where('id', '[0-9]+');
    Route::get('restore/{id}', 'restore')->name('users.restore')
        ->where('id', '[0-9]+');
});
Route::resource('users', UserController::class);

Route::prefix('posts')->controller(PostController::class)->group(function () {
    Route::get('trash', 'trash')->name('posts.trash');
    Route::get('force-delete/{id}', 'forceDelete')->name('posts.forceDelete')
        ->where('id', '[0-9]+');
    Route::get('restore/{id}', 'restore')->name('posts.restore')
        ->where('id', '[0-9]+');
});

Route::resource('posts', PostController::class);
