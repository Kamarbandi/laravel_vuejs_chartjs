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

Route::get('/', 'Site\HomeController@home')->name('home');
Route::get('/ajax-component', 'Site\HomeController@ajaxComponent')->name('ajax-component');
Route::get('/data-chart', 'Site\HomeController@chartData');
Route::get('/random-chart', 'Site\HomeController@randomData');
Route::get('/start/socket-chart', 'Site\HomeController@newEvent');