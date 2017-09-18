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
    return view('auth.login');
});

Route::get('/welcome', function () {
    return view('welcome');
});


Route::get('/home', function () {
    return view('home');
});

//Route::get('/admin', function () {
//    $users = \App\User::all();
//
//    return view('admin')->with(compact('users'));
//});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::any('/admin', 'UserController@getData')->name('admin');
//Route::post('/activate/{id}', 'UserController@activateUser')->name('activate');
Route::post('/activate', 'UserController@activateUser')->name('activate');
Route::post('/deactivate', 'UserController@deactivateUser')->name('deactivate');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/import', 'ImportController@index')->name('import');
    Route::post('/import', 'ImportController@store');
});

Route::get('/analytics', 'AnalyticsController@index')->name('analytics');
Route::get('/browse', 'BrowseController@index')->name('browse');
Route::get('/upload', 'UploadController@index')->name('upload');
Route::get('/settings', 'SettingsController@index')->name('settings');