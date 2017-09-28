<?php

use App\User;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'as' => 'charts.',
    'prefix' => 'charts',
//    'middleware' => 'auth:api',
    'namespace' => 'Api',
], function () {
    Route::any('/', 'ChartController@index');
});