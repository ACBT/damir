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

Route::post('admin/Tovarcreate', 'TovarController@store')->name('Tovar.store');
Route::post('admin/Tovarindex', 'TovarController@index')->name('Tovar.index');
Route::post('admin/Tovarupdate', 'TovarController@destroy')->name('Tovar.destroy');
Route::post('admin/Starscreate', 'StarsController@store')->name('Stars.store');
Route::post('admin/versioncreate', 'VersionController@store')->name('version.store');
Route::post('admin/versionupdate', 'VersionController@destroy')->name('version.destroy');

Route::get('/', 'HomeController@index')->name('home');
