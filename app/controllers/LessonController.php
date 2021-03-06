<?php

class LessonController extends \BaseController {
	public function showHeader($uid, $lid)
	{
		$lesson = Lesson::find($lid);
		return View::make('lesson.header')->with('lesson',$lesson);
	}

	public function index($uid)
	{
		return View::make('lesson.index')->with('user',User::find($uid))
																		 ->with('lessons',User::find($uid)->lessons);
	}

	public function create($uid)
	{
		$user = User::find($uid);
		$url = action('LessonController@index', [$uid]);
		return View::make('lesson.create')->with('user', $user)
																			->with('url', $url);
	}

	public function store($uid)
	{
		$rules = array('title'       => 'required'
		 							,'description' => 'required');
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails())
		{
			return "\nCreate lesson failed- not all fields entered";
		} else {
			echo "\nInput has everything required for a new lesson";
			$lesson = new Lesson;
			$lesson->title = Input::get('title');
			$lesson->description = Input::get('description');
			$lesson->user_id = $uid;
			$lesson->save();
			return "\nCreate success!";
		}
	}

	public function show($uid, $lid)
	{
		$lesson = Lesson::find($lid);
		$user = User::find($uid);
		if($lesson->user_id == $user->id)
		{
			// return $lesson;
			return View::make('lesson.profile')->with('user',$user)
																				 ->with('lesson',$lesson);
		} else {
			return "You don't have access!";
		}
	}

	public function edit($uid, $lid)
	{
		$user = User::find($uid);
		$lesson = Lesson::find($lid);
		$url = action('LessonController@show', [$uid, $lid]);
		if($lesson->user_id == $user->id)
		{
			return View::make('lesson.edit')->with('user', $user)
																			->with('lesson', $lesson)
																			->with('url', $url);
		} else {
			return 'no access!';
		}
	}

	public function update($uid, $lid)
	{
		$rules = array('title'       => 'required'
		 							,'description' => 'required');
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails())
		{
			return "Edit lesson failed";
		} else {
			echo "\nInput has everything required for edit user";
			$lesson = Lesson::find($lid);
			if(!$lesson->user_id == $uid){
				return "Not authorized!";
			}
			$lesson->title = Input::get('title');
			$lesson->description = Input::get('description');
			$lesson->save();
			return "Edit success!";
		}
		return "\nstore!";
	}

	public function destroy($uid, $lid)
	{
		Lesson::destroy($lid);
		return "delete success";
	}

}
