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
// website routes
//   http
Route::get('/', function()
{
	return View::make('hello');
});
Route::get('/home', 'HomeController@getHome');
Route::get('/test', 'TestRESTController@getTest');
Route::get('/login', 'UserController@getLogin');
//   https

// filters

// User REST routes
Route::resource('user', 'UserController');
Route::resource('user.lesson', 'LessonController');
Route::resource('user.lesson.hotspot', 'HotspotController');

// test routes
Route::get('/user/{uid}/lesson/{lid}/header', 'LessonController@showHeader');