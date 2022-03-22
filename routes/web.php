<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ClaimsController;
use App\Http\Controllers\ThirdPartiesController;

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

/* Usuarios */

Route::group(['prefix' => 'users'], function(){
    Route::get('/', [UsersController::class, 'index']);
    Route::get('/pending', [UsersController::class, 'pending']);
    Route::get('/create', [UsersController::class, 'create'])->name('user.create');
    Route::get('/{user}', [UsersController::class, 'show'])->name('user.show');
    Route::post('', [UsersController::class, 'store']);
    Route::get('/{user}/edit', [UsersController::class, 'edit'])->name('user.edit');
    Route::put('/{user}', [UsersController::class, 'update']);
    Route::delete('/{user}', [UsersController::class, 'destroy']);
    Route::post('/approval/{user}', [UsersController::class, 'approval']);
    Route::post('/denial/{user}', [UsersController::class, 'denial']);

});

/* Reclamaciones */ 

Route::group(['prefix' => 'claims'], function(){
    Route::get('/', [ClaimsController::class, 'index']);
    Route::get('/create', [ClaimsController::class, 'create'])->name('user.create');
    Route::get('/create/step-two', [ClaimsController::class, 'stepTwo']);

    /* Terceros */
    Route::group(['prefix' => 'third-parties'], function(){

        Route::get('/', [ThirdPartiesController::class, 'index']);
        Route::get('/create', [ThirdPartiesController::class, 'create']);
        Route::post('/', [ThirdPartiesController::class, 'store']);
        Route::get('/{thirdParty}', [ThirdPartiesController::class, 'show']);
        Route::get('/{thirdParty}/edit', [ThirdPartiesController::class, 'edit']);
        Route::put('/{thirdParty}', [ThirdPartiesController::class, 'update']);
        Route::delete('/{thirdParty}', [ThirdPartiesController::class, 'destroy']);
        
        
    });

});

