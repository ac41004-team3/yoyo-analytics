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

Auth::routes();


Route::post('/updateUser', 'UserController@update')->name('updateUser');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['as' => 'admin.', 'prefix' => 'admin'], function() {
        Route::get('/', 'AdminController@index')->name('index');
    });

    Route::group(['as' => 'import.', 'prefix' => 'import'], function() {
        Route::get('/', 'ImportController@index')->name('index');
        Route::post('/', 'ImportController@store')->name('store');
    });


    Route::get('/analytics', 'AnalyticsController@index')->name('analytics.index');
    Route::get('/browse', 'BrowseController@index')->name('browse.index');
    Route::get('/settings', 'SettingsController@index')->name('settings.index');
});