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
Route::post('getOutletTotals', 'TransactionsController@getOutletTotals');


Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::group([
        'as' => 'admin.',
        'prefix' => 'admin',
        'middleware' => ['role:admin'],
    ], function () {
        Route::resource('/users', 'UserController');
    });

    Route::group(['as' => 'import.', 'prefix' => 'import'], function () {
        Route::get('/', 'ImportController@index')->name('index');
        Route::post('/', 'ImportController@store')->name('store');
    });

    Route::view('/takings', 'takings');



    Route::get('/analytics', 'AnalyticsController@index')->name('analytics.index');
    Route::get('/browse', 'BrowseController@index')->name('browse.index');
    Route::get('/settings', 'SettingsController@index')->name('settings.index');
});