<?php

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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::prefix('audios')->group(function(){
        Route::get('/', 'AudioController@allToWeb');
        Route::get('/form', 'AudioController@index');
        Route::post('/upload', 'AudioController@store');
        Route::get('/{id}', 'AudioController@show');
    });

    Route::get('/register_gas_station', 'GasStationController@index');
    Route::post('/register_gas_station', 'GasStationController@store');

});






