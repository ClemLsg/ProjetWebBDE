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

Route::get('/category/{name}', 'CategoryController@jsonProducts');
Route::get('/image/url', 'CategoryController@jsonUrl');
Route::get('/allproducts', 'CategoryController@jsonAllProducts');

/**
 * Resource route for the requests about the orders in the API
 * Everything is allowed except the edit and create through GET request
 */
Route::resource('orders', 'API\OrderAPIController')->only(['index', 'show', 'store', 'update', 'destroy']);

/**
 * Resource route for the requests about the pictures in the API
 * Everything is allowed except the edit and create through GET request
 */
Route::resource('pictures', 'API\PictureAPIController')->except(['create', 'edit']);
Route::get('image/comments/{id}', 'API\PictureAPIController@showComments');
Route::get('likes', 'EventController@jsonLikes');

/**
 * Resource route for the requests about the users in the API.
 * Only the GET /api/users and GET /api/users/{user} are allowed.
 */
Route::resource('users', 'API\UsersAPIController')->only(['index', 'show']);

/**
 * Resource route for the requests about the activities in the API
 * Everything is allowed except the edit and create through GET request
 */
Route::resource('activities', 'API\ActivitiesAPIController')->except(['create', 'edit']);
Route::get('url/activities', 'EventsController@jsonUrl');

/**
 * Resource route for the requests about the users activities in the API
 * Everything is allowed except the edit, create through GET request and update through PUT
 */
Route::resource('activitiesUsers','API\ActivitieUserAPIController')->except(['create', 'edit', 'update']);

/**
 * Resource route for the requests about the comments activities in the API
 * Everything is allowed except the edit and create through GET request
 */
Route::resource('comments', 'API\CommentsAPIController')->except(['create', 'edit']);

/**
 * Resource route for the requests about the ideas contained in the idea box in the API
 * Everything is allowed except the edit and create through GET request
 */
Route::resource('ideaBox', 'API\IdeaBoxAPIController')->except(['create', 'edit']);