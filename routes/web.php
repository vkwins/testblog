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
/*
    |--------------------------------------------------------------------------
    | Start Url pass dyanemic value golble dife  Routes
    |--------------------------------------------------------------------------
*/
    $router->pattern('section', '[a-zA-Z-]+');
    $router->pattern('id', '[0-9]+');
    $router->pattern('title', '[a-zA-Z0-9-]+');
    $router->pattern('name', '[a-zA-Z0-9-]+');
/*
    |--------------------------------------------------------------------------
    | End Url pass dyanemic value golble dife  Routes
    |--------------------------------------------------------------------------
*/

/*
    |--------------------------------------------------------------------------
    | Start Index Routes
    |--------------------------------------------------------------------------
*/

    Route::get('/', function () {
            return view('trakingform.trakingform');
        });

/*
    |--------------------------------------------------------------------------
    | End Index Routes
    |--------------------------------------------------------------------------
*/

/*
    |--------------------------------------------------------------------------
    | Start Traking data Routes
    |--------------------------------------------------------------------------
*/

    Route::get('/trakingcode-info', ['uses' => 'Trakingcode\TrakingcodeController@Trakingcode_Submited']);
    Route::get('/traking-info', ['uses' => 'Trakingcode\TrakingcodeController@Traking_Daily_Data']);

/*
    |--------------------------------------------------------------------------
    | End Index Routes
    |--------------------------------------------------------------------------
*/





