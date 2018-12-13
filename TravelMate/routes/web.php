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


Route::get('/profile/{id}', ['as' => 'profile', 'uses' => 'DashboardController@showProfile']);
Route::get('/dashboard', 'DashboardController@index');
Route::patch('/dashboard', ['as' => 'users.update', 'uses' => 'DashboardController@updateUserDetails']);
Route::patch('/dashboard/avatar', ['as' => 'users.updateAvatar', 'uses' => 'DashboardController@updateUserAvatar']);
Route::get('/admin', 'AdminPanelController@index');

Route::get('/admin/users', 'AdminPanelController@manageUsers');

Route::get('/admin/users/{id}/edit', 'AdminPanelController@editUser');
Route::patch('/admin/users/{id}/edit', 'AdminPanelController@updateUser');
Route::delete('/admin/users/{id}/delete', 'AdminPanelController@deleteUser');
Route::patch('/stories/{id}/approve', 'AdminPanelController@approveStory');
