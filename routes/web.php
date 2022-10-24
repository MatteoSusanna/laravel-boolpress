<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function(){
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('posts', 'PostController');
        Route::resource('categories', 'CategoryController');
        Route::resource('tags', 'TagController');

        Route::get('destroy', 'PostController@indexSoft')->name('destroy');
        Route::get('restore/{post}', 'PostController@restore')->name('restore');
        Route::delete('forceDestroy/{post}', 'PostController@forceDestroy')->name('forceDestroy');
    });


Route::get('{any?}', function(){
    return view('guest.home');
})->where('any', '.*');
