<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('posts', 'Api\PostsController@index');

Route::get('posts/{slug}', 'Api\PostsController@show');

Route::post('contacts', 'Api\ContactController@store');

Route::get('categories', 'Api\CategoryController@index');