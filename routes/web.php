<?php

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
    return redirect()->route('users.index');
});

Route::prefix('users')->controller(UserController::class)->group(function () {
    Route::get('trash', 'trash')->name('users.trash');
    Route::get('force-delete/{id}', 'forceDelete')->name('users.forceDelete')
        ->where('user', '[0-9]+');
    Route::get('restore/{id}', 'restore')->name('users.restore')
        ->where('user', '[0-9]+');
});

Route::resource('users', UserController::class);
