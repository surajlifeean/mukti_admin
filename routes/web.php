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


Route::resource('customers','customers');

Route::resource('customerdetails','DetailsController');

Route::resource('group','GroupController');

Route::get('/download','DownloadcsvController@download');


Route::get('/report','DownloadcsvController@showdownloadpage');

Route::get('/register', 'customers@create');

