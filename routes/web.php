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
Route::get('tree/{email?}', 'PagesController@tree')->name('pages.tree');

Route::get('users/change_pass/{id}', 'UsersController@change_pass');
Route::put('users/change_pass_save/{id}', 'UsersController@change_pass_save')->name('users.change_pass_save');
Route::get('users/getUserById/{id}', 'UsersController@getUserById');
Route::post('users/store_child', 'UsersController@store_child')->name('users.store_child');
//id = parent_id, child_id = child id to be remove, selected_id for the view in profile optional
Route::get('users/remove_child/{id}/{child_id}/{selected_id?}', 'UsersController@remove_child')->name('users.remove_child');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('movies/{category}/{search_string?}', 'MoviesController@category')->name('movies.category');
Route::get('movies/single/{slug}', 'MoviesController@single')->name('movies.single');
Route::get('movies/convert_percentage', 'MoviesController@convert_percentage');

Route::resources([
    'users' => 'UsersController',
    'movies' => 'MoviesController',
]);


Route::get('applicants/{applicant}/send', 'ApplicantsController@send')->name('applicants.send');
Route::resources([
    'applicants' => 'ApplicantsController',
]);


// all here are just example sending emails
Route::get('leoemailbefore', 'LeoemailwaysController@leo_do_email_before');
Route::get('leomailables', 'LeoemailwaysController@leo_do_mailable');
Route::get('leonotifications', 'LeoemailwaysController@leo_do_notifications');
Route::get('leoondemandnotifications', 'LeoemailwaysController@leo_do_ondemandnotifications');

//show only the view of the mailable
Route::get('/viewmailable', 'ApplicantsController@viewmailable');
