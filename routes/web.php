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

Route::get('/', function () {
    return view('shop');
})->name('shop');

Route::get('/product', function (){
    return view('product');
})->name('product');

Route::get('/category', function (){
    return view('category');
})->name('category');

Route::get('/cart', function(){
    return view('cart');
})->name('cart');

Route::get('/user', function(){
    return view('user');
})->name('user');

Route::get('/contact', function(){
    return view('contact');
})->name('contact');
