<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@showWelcome');

// Authentication
Route::get('login', array('as' => 'login', 'uses' => 'AuthController@showLogin'));
Route::post('login', 'AuthController@postLogin');
Route::get('logout', 'AuthController@getLogout');
Route::get('register', 'AuthController@showRegistration');
Route::post('register', 'AuthController@postRegistration');
Route::post('store',array('as'=>'store', 'before'=>'auth','uses'=> 'UploadController@store'));

// Secure-Routes
Route::group(array('before' => 'auth'), function()
{

	Route::get('profile', 'AuthController@showProfile');
	Route::get('contact', 'HomeController@contact');
 	Route::post('contact','HomeController@sendContact');
});


// Définir les routes automatiques par controller
Route::group(array('before' => 'auth'), function()
{
	Route::resource('upload', 'UploadController');
	Route::post('newfolder', 'UploadController@addFolder');

});


// Filtre Admin
Route::group(array('before' => 'admin'), function() 
{
	Route::get('admin', 'HomeController@showAdmin');
	Route::get('admin/users', 'UserController@index');
	Route::get('admin/files', 'UploadController@index');
	Route::resource('users', 'UserController');
});
