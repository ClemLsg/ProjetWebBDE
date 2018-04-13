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

//Route::resource('products','API\ProductsController')->except(['create', 'edit']);
/**
 * Resource route for the requests about the products in the API
 * Everything is allowed except the edit and create through GET request
 */
Route::resource('products','API\ProductsAPIController')->except(['create', 'edit']);

Route::get('/products/{name}', 'CategoryController@jsonProducts');
Route::get('/image/url', 'CategoryController@jsonUrl');

/**
 * Resource route for the requests about the orders in the API
 * Only the GET /api/orders and GET /api/orders/{order} are allowed.
 */
Route::resource('orders', 'API\OrderAPIController')->only(['index', 'show']);

/**
 * Resource route for the requests about the pictures in the API
 * Everything is allowed except the edit and create through GET request
 */
Route::resource('pictures', 'API\PictureAPIController')->except(['create', 'edit']);

/**
 * Resource route for the requests about the users in the API.
 * Only the GET /api/users and GET /api/users/{user} are allowed.
 */
Route::resource('users', 'API\UsersApiController')->only(['index', 'show']);

/**
 * Resource route for the requests about the activities in the API
 * Everything is allowed except the edit and create through GET request
 */
Route::resource('activities', 'API\ActivitiesAPIController')->except(['create', 'edit']);
