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
Route::get('/login', 'UserController@getLogin', ['as'=>'login']);
Route::post('/login', function(){
	$rules = ['username'=>'required'
					 ,'password'=>'required'];
	$validation = Validator::make(Input::all(), $rules);
	if($validation->fails()) {
		return Redirect::to('/login')->with('message', 'Login failure');
	}
	if(Auth::attempt(['username'=>Input::get('username')
									 ,'password'=>Input::get('password')]))
	{
		return Redirect::to('/app');
	} else {
		return Redirect::to('/login')->with('message', 'Login failure');
	}
});
Route::post('/logout', function() {
	if(Auth::check()){
		Auth::logout();
	}
	return "<a href='/login'>Back to login</a>";
	return Redirect::route('/login');
});
Route::get('/app', function(){
	if(Auth::check()){
		$lessons = App::make('LessonController')->index(Auth::user()->id);
		$user    = User::find(Auth::user()->id);
		return View::make('pages.app')->with('lessons', $lessons)
																	->with('user', $user);
	} else {
		return "Not logged in. <a href='/login'>Please log in</a>";
		return Redirect::route('/login');
	}
}, ['as'=>'app']);
//   https

// filters

// User REST routes
Route::resource('user', 'UserController');
Route::resource('user.lesson', 'LessonController');
Route::resource('user.lesson.hotspot', 'HotspotController');

// test routes
Route::get('/user/{uid}/lesson/{lid}/header', 'LessonController@showHeader');