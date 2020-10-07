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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/vivify', function () {
    echo "<h1>You are GET-ing to Vivify!</h1>";
})->name('vivifyGet')->middleware(['age']);

Route::post('/vivify', function () {
    echo "<h1>You are POST-ing to Vivify!</h1>";
})->name('vivifyPost');

Route::put('/vivify', function () {
    echo "<h1>You are PUT-ing to Vivify!</h1>";
})->name('vivifyPut');

Route::patch('/vivify', function () {
    echo "<h1>You are PATCH-ing to Vivify!</h1>";
})->name('vivifyPatch');

Route::delete('/vivify', function () {
    echo "<h1>You are DELETE-ing to Vivify!</h1>";
})->name('vivifyDelete');


