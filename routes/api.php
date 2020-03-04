<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Rutas de Productos
 */
Route::get('/products', 'ProductsController@getList')->name('api_products_list');
Route::get('/products/{id}/show', 'ProductsController@getShow')->name('api_products_show');
Route::post('/products/new', 'ProductsController@getNew')->name('api_products_new');
Route::post('/products/{id}/edit', 'ProductsController@getEdit')->name('api_products_edit');
Route::post('/products/{id}/remove', 'ProductsController@getRemove')->name('api_products_remove');

/**
 * Rutas de Media
 */
Route::get('/media', 'ProductsController@getList')->name('api_media_list');
Route::get('/media/{id}/show', 'ProductsController@getShow')->name('api_media_show');
Route::post('/media/new', 'ProductsController@getNew')->name('api_media_new');
Route::post('/media/{id}/edit', 'ProductsController@getEdit')->name('api_media_edit');
Route::post('/media/{id}/remove', 'ProductsController@getRemove')->name('api_media_remove');

/**
 * Rutas de Media
 */
Route::get('/order', 'OrdersController@create')->name('api_order_create');
