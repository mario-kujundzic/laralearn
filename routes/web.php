<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/vivify/{first_name?}', [HomeController::class, 'vivifyGet'])->name('vivifyGet');

Route::post('/vivify', [HomeController::class, 'vivifyPost'])->name('vivifyPost');

Route::put('/vivify', [HomeController::class, 'vivifyPut'])->name('vivifyPut');

Route::patch('/vivify', [HomeController::class, 'vivifyPatch'])->name('vivifyPatch');

Route::delete('/vivify', [HomeController::class, 'vivifyDelete'])->name('vivifyDelete');

Route::resource('users', UserController::class);
