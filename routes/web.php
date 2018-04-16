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

Route::resources([
    'agencies' => 'AgenciesController',
]);

Route::get('ourstory', 'PagesController@ourstory');
Route::get('events', 'PagesController@events');
Route::get('gallery', 'PagesController@gallery');
Route::get('contact', 'PagesController@contact');
Route::get('tree', 'PagesController@tree');

Route::get('users/change_pass/{id}', 'UsersController@change_pass');
Route::put('users/change_pass_save/{id}', 'UsersController@change_pass_save')->name('users.change_pass_save');
Route::get('users/getUserById/{id}', 'UsersController@getUserById');
Route::post('users/store_child', 'UsersController@store_child')->name('users.store_child');
//id = parent_id, child_id = child id to be remove, selected_id for the view in profile optional
Route::get('users/remove_child/{id}/{child_id}/{selected_id?}', 'UsersController@remove_child')->name('users.remove_child');

Route::get('pages/tree/{email?}', 'PagesController@tree')->name('pages.tree');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resources([
    'users' => 'UsersController',
]);
