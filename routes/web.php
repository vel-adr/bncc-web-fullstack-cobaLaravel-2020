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
    return view('index');
});

Route::get('/data-tables', function () {
    return view('table');
});

Route::get('/register', function () {
    return view('register');
});

// Route::post('/welcome', 'AuthController@request');
// Route::get('/pertanyaan', 'PertanyaanController@index');
// Route::post('/pertanyaan', 'PertanyaanController@store');
// Route::get('/pertanyaan/create', 'PertanyaanController@create');
// Route::get('/pertanyaan/{id}', 'PertanyaanController@show');
// Route::put('/pertanyaan/{id}', 'PertanyaanController@update');
// Route::delete('/pertanyaan/{id}', 'PertanyaanController@destroy');
// Route::get('/pertanyaan/{id}/edit', 'PertanyaanController@edit');

Route::resource('pertanyaan', 'PertanyaanController');
