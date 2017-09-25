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

use App\Import;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::group([
        'as' => 'admin.',
        'prefix' => 'admin',
        'middleware' => ['role:admin|super admin'],
    ], function () {
        Route::resource('/users', 'UserController');

        Route::group([
            'as' => 'import.',
            'prefix' => 'import',
            'middleware' => ['permission:manage-data'],
        ], function () {
            Route::get('/', 'ImportController@index')->name('index');
            Route::post('/', 'ImportController@store')->name('store');
            Route::post('/revert', 'ImportController@revert')->name('revert');
        });
    });

    Route::get('/analytics', 'AnalyticsController@index')->name('analytics.index');
    Route::get('/browse', 'BrowseController@index')->name('browse.index');
    Route::get('/settings', 'SettingsController@index')->name('settings.index');
    Route::get('/charts', 'ChartsController@index');
    Route::get('/outlets', 'OutletsController@index');
    Route::get('/customers', 'CustomersController@index');
    Route::get('/transactions', 'TransactionsController@index');
});
