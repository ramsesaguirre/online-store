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
// Route::get('/products', 'ProductsController@getList')->name('api_products_list');
// Route::get('/products/{id}/show', 'ProductsController@getShow')->name('api_products_show');
// Route::post('/products/new', 'ProductsController@getNew')->name('api_products_new');
// Route::post('/products/{id}/edit', 'ProductsController@getEdit')->name('api_products_edit');
// Route::post('/products/{id}/remove', 'ProductsController@getRemove')->name('api_products_remove');

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
Route::post('/order/create', 'OrdersController@create')->name('api_order_create');


/**
 * Rutas de Productos gestion administrador
 */
Route::get('/admin/products', 'Api\AdminProductsController@getList')->name('api_admin_products_list');
Route::get('/admin/products/{id}/show', 'Api\AdminProductsController@getShow')->name('api_admin_products_show');
Route::post('/admin/products/create', 'Api\AdminProductsController@setCreate')->name('api_admin_products_create');
Route::post('/admin/products/{id}/edit', 'Api\AdminProductsController@getEdit')->name('api_admin_products_edit');
Route::delete('/admin/products/{id}/remove', 'Api\AdminProductsController@setRemove')->name('api_admin_products_remove');

/**
 * Rutas de Productos Cliente
 */
Route::get('/products/list', 'Api\ClientProductsController@getList')->name('api_client_products_list');
Route::get('/products/{token}/show', 'Api\ClientProductsController@getShow')->name('api_client_products_show');
