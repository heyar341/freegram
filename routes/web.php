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


Auth::routes();

Route::get('profile/{user_id}', 'ProfilesController@index')->name('profile.show');
Route::get('profile/{user_id}/edit', 'ProfilesController@edit')->name('profile.edit');
Route::patch('profile/{user}', 'ProfilesController@update')->name('profile.update');

Route::get('/p/create', 'PostsController@create');
Route::get('/p/{post}', 'PostsController@show');
//                ↑{post}にはどんな値でも入るから、createより上に書いてしまうと、create機能が使えなくなる
Route::post('/p', 'PostsController@store');
