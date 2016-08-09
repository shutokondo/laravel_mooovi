<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::auth();

Route::get('/', 'ProductsController@index');

Route::get('/products/search/', 'ProductsController@search');

Route::resource('products', 'ProductsController', ['only' => ['index', 'show']]);

Route::resource('products.reviews', 'ReviewsController', ['only' => ['create', 'store']]);

Route::resource('users', 'UsersController', ['only' => 'show']);
