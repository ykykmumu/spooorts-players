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
    return view('top');
});

Route::get('/show/{id}', 'ProfileController@show')->name('profile');
Route::get('/edit/{id}', 'ProfileController@edit')->name('profile.edit');
Route::post('/update/{id}', 'ProfileController@update')->name('profile.update');
Route::post('/delete/{id}', 'ProfileController@destroy')->name('profile.delete');

Auth::routes();

Route::get('/home', 'PostsController@index');

Route::get('/home/{sport}', 'PostsController@show');

Route::get('/posts/new', 'PostsController@new')->name('new');

Route::post('/posts', 'PostsController@store');

Route::get('/home/{sport}/person/{id}', 'PostsController@person')->name('person');

Route::get('/home/{sport}/edit/{id}', 'PostsController@edit')->name('post.edit');


Route::get('/like/{to_user_id}/{from_user_id}/{status}', 'ReactionController@create')->name('request');






Route::get('/image_input', 'ImageController@getImageInput');
Route::post('/image_confirm', 'ImageController@postImageConfirm');
Route::post('/image_complete', 'ImageController@postImageComplete');