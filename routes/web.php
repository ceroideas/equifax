<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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

Auth::routes();

Route::get('users', [UsersController::class, 'index']);
Route::get('users/create', [UsersController::class, 'create'])->name('user.create');;
Route::post('users', [UsersController::class, 'store']);
Route::get('users/{user}/edit', [UsersController::class, 'edit'])->name('user.edit');
Route::put('users/{user}', [UsersController::class, 'update']);
Route::delete('users/{user}', [UsersController::class, 'destroy']);

