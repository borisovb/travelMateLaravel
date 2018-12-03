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
    return view('homepage');
});

Auth::routes();

Route::resource('stories', 'StoryController');

Route::get('/profile/{id}', 'DashboardController@showProfile');
Route::get('/dashboard', 'DashboardController@index');
Route::patch('/dashboard',  ['as' => 'users.update', 'uses' => 'DashboardController@updateUserDetails']);

