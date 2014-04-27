<?php
// http://culttt.com/2013/07/01/setting-up-your-first-laravel-4-controller/
class TestRESTController extends \BaseController {
	public function getTest()
	{
		// return View::make('test')->with('users', User::all())
		// 												 ->with('lessons', Lesson::all())
		// 												 ->with('hotspots', Hotspot::all());
														 
		return View::make('test')->withUsers(User::all())
														 ->withLessons(Lesson::all())
														 ->withHotspots(Hotspot::all());
														 
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// So for example, the URL /user would display all users in the application.
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// For example, the URL /user/create should display the form that allows a user to sign up.
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// After the form is submitted on /user/create it is POSTed to the Store method which takes the data and inserts it into the database.
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
	}


}
