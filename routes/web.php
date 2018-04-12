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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'IndexController@index')->name('index');

Route::get('/product', 'ProductController@index')->name('product');

Route::get('/category', 'CategoryController@index')->name('category');

Route::get('/cart', 'CartController@index')->name('cart');

Route::get('/user', 'UserPageController@index')->name('user');

Route::get('/contact','ContactController@index')->name('contact');

Route::get('/shop', 'ShopController@index')->name('shop');

Route::get('/ideabox', 'IdeaboxController@index')->name('ideabox');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/dashboard/command', 'DashcommandController@index')->name('dashcommand');

Route::get('/dashboard/pastcommand', 'pastcommandController@index')->name('pastcommand');