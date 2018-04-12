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

Route::resource('products','API\ProductsAPIController')->except(['create', 'edit']);

Route::resource('orders', 'API\OrderAPIController')->only(['index', 'show']);

Route::resource('pictures', 'API\PictureAPIController')->except(['create', 'edit']);

/**
 * Resource route for the requests about the users in the API.
 * Only the GET /api/users and GET /api/users/{user} are allowed.
 */
Route::resource('users', 'API\UsersApiController')->only(['index', 'show']);
