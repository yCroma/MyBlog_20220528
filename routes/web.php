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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/guest', 'GuestController@index')->name('guest.index');
Route::get('/guest/{file_name}', 'GuestController@show')->name('guest.show');
Route::get('/guest/tags/{tag_name}', 'GuestController@tag')->name('guest.tag');

/*
Route::resource('guest', 'GuestController')->only([
    'index', 'show'
]);
*/

Auth::routes([
    'register' => false
]);

Route::resource('admin', 'AdminController')->only([
    'index', 'show'
])->middleware('auth');
Route::resource('articles', 'ArticleController')->middleware('auth');
Route::resource('tags', 'TagController')->only([
    'index', 'store', 'show', 'destroy'
])->middleware('auth');

// Route::get('/home', 'HomeController@index')->name('home');
