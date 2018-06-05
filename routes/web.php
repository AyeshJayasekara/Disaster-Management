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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/Report', 'HomeController@reportRecieve')->name('report');
Route::get('/manager', 'ManagerController@land')->name('manager');
Route::get('/moderate','ManagerController@mod');
Route::post('/approve','ManagerController@approve');
Route::get('/show','HomeController@showincidents');
Route::get('/reports','HomeController@reports')->name('home');