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



Route::get('recruit/login', 'RecruitLoginController@index')->name('recruit.login');
Route::post('recruit/login', 'RecruitLoginController@login');

Route::get('/', function () {
    return view('top');
});



Route::get('/show/{id}', 'ProfileController@show')->name('profile');
Route::get('/edit/{id}', 'ProfileController@edit')->name('profile.edit');
Route::post('/update/{id}', 'ProfileController@update')->name('profile.update');
Route::post('/delete/{id}', 'ProfileController@destroy')->name('profile.delete');

Auth::routes();

Route::get('/home', 'PostsController@index');

Route::get('/home/{sport}', 'PostsController@show')->name('show');

Route::get('/posts/new', 'PostsController@new')->name('new');

Route::post('/posts', 'PostsController@store');

Route::get('/home/{sport}/person/{id}/{count}', 'PostsController@person')->name('person');

Route::get('/home/{sport}/edit/{id}/{count}', 'PostsController@edit')->name('post.edit');

Route::post('/home/update/{id}', 'PostsController@update')->name('post.update');

Route::post('/home/delete/{id}', 'PostsController@destroy')->name('post.delete');


Route::get('/like/{to_user_id}/{from_user_id}/{status}', 'ReactionController@create')->name('request');

Route::get('/matching', 'MatchingController@index')->name('matching');


