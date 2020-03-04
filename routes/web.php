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

    /* Home del portal */
    Route::get('/', function () {
        return view('app');
    });

    /*Route::get('{any}', function () {
        return view('app');
    })->where('any', '.*');*/

    //Auth::routes();

    /* Rutas del administrador */
    Route::namespace('Admin')->prefix('admin')->as('admin.')->group(function() {
        //Auth::routes(['register' => false]);
        Auth::routes();
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/home', 'HomeController@index')->name('home');
    });



