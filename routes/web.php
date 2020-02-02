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

use App\Http\Controllers\PostsController;

Route::get('/', 'BookstoresController@index')->name('index');

// Route::resource('comments', 'CommentsController', ['only' => ['store']]);
Route::resource('bookstores', 'BookstoresController', ['only' => ['bookstore']]);

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/reviews', 'PostsController@reviews')->name('reviews');

Route::group(['middleware' => 'auth'], function () {
    Route::prefix('bookstore/{bookstore_id}')->group(function () {
        Route::resource('posts', 'PostsController', ['only' => ['create', 'store', 'show', 'edit', 'update', 'destroy']]);
    });
    Route::get('/{bookstore}', 'BookstoresController@bookstore')->name('bookstore');
});
Route::post('bookstore/{bookstore_id}/posts/show/comments', 'CommentsController@store')->name('comments.store');
