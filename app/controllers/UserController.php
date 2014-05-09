<?php

class UserController extends BaseController {

	public function getLogin()
	{
		$url = action('UserController@create');
		$registerForm = App::make('UserController')->create();
		return View::make('pages.login')->with('url', $url)
																		->with('registerForm', $registerForm);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// So for example, the URL /user would display all users in the application.
		// return "index! show all users!";
		$users = User::all();
		return $users;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// For example, the URL /user/create should display the form that allows a user to sign up.
		// return "create!";
		return View::make('user.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// After the form is submitted on /user/create it is POSTed to the Store method which takes the data and inserts it into the database.
		$rules = array(
			'username'  => 'required'
			,'email'    => 'required|email'
			,'password' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails())
		{
			return "\nCreate user failed <a href='/login'>Back to login</a>";
		} else {
			echo "\nInput has everything required for a new user";
			$user = new User;
			$user->username = Input::get('username');
			$user->email    = Input::get('email');
			$user->password = Hash::make( Input::get('password') );
			$user->save();
			return "\nCreate success! <a href='/login'>Back to login</a>";
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// For example, to see the profile page of the user with an id of 1, you would go to the URL /user/1 in your browser.
		// return "show user $id!";
		$user = User::findOrFail($id);
		return View::make('user.profile')->with('user', $user);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// For example, to edit the profile of user 1, you would go to /user/1/edit.
		// return "edit user $id!";
		return View::make('user.edit')->with('user', User::find($id));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// The Update method is for updating the database once the form on the edit page has been submitted.
		// return "update user $id!";
		$rules = array(
			'username'      => 'required'
			,'email'    => 'required|email'
			,'password' => 'required'
		);
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails())
		{
			return "Edit user failed";
		} else {
			echo "\nInput has everything required for edit user";
			$user = User::find($id);
			$user->username = Input::get('username');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			$user->save();
			return "Edit success!";
		}
		return "\nstore!";
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// To delete user 1 from the application, you would send a DELETE request to /user/1
		$user = User::find($id);
		User::destroy($id);
		return "delete success";
	}
}