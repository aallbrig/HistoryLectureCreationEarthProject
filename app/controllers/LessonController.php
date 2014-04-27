<?php

class LessonController extends \BaseController {

	public function index($uid)
	{
		return User::find($uid)->lessons;
	}

	public function create($uid)
	{
		return View::make('lesson.create')->with('uid', $uid);
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
		if($lesson->user_id == $uid)
		{
			return $lesson;
		} else {
			return "You don't have access!";
		}
	}

	public function edit($uid, $lid)
	{
		$user = User::find($uid);
		$lesson = Lesson::find($lid);
		if($lesson->user_id == $user->id)
		{
			return View::make('lesson.edit')->with('user', $user)->with('lesson', $lesson);
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
