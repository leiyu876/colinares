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

Route::get('ourstory', 'PagesController@ourstory');
Route::get('events', 'PagesController@events');
Route::get('gallery', 'PagesController@gallery');
Route::get('contact', 'PagesController@contact');

Route::get('users/change_pass/{id}', 'UsersController@change_pass');
Route::put('users/change_pass_save/{id}', 'UsersController@change_pass_save')->name('users.change_pass_save');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resources([
    'users' => 'UsersController',
]);
