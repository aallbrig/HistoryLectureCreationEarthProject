<?php

class HotspotController extends \BaseController {

		protected $layout = 'layouts.master';

	public function index($uid, $lid)
	{
		$lesson = Lesson::find($lid);
		if($lesson->user_id == $uid)
		{
			return $lesson->hotspots;
		} else {
			return "You don't have access!";
		}
	}

	public function create($uid, $lid)
	{
		$user = User::find($uid);
		$lesson = Lesson::find($lid);
		if(!$user->id == $lesson->user_id){
			return "Not authorized";
		}
		return View::make("hotspot.create")->with("user", $user)
																			 ->with("lesson", $lesson);
	}

	public function store($uid, $lid)
	{
		$user = User::find($uid);
		$lesson = Lesson::find($lid);
		// authorization
		if(!$user->id == $lesson->user_id){
			return "Not authorized";
		}
		$rules = array('title'       => 'required'
		 							,'description' => 'required'
		 							,'longitude'   => 'required | integer | between:-180,180'
		 							,'latitude'    => 'required | integer | between:-180,180');
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
			$hotspot = new Hotspot;
			$hotspot->title = Input::get('title');
			$hotspot->description = Input::get('description');
			$hotspot->longitude = Input::get('longitude');
			$hotspot->latitude = Input::get('latitude');
			$hotspot->lesson_id = $lesson->id;
			$hotspot->save();
			return "Create success!";
		}
		return "Hotspot store!";
	}

	public function show($uid, $lid, $hid)
	{
		$lesson = Lesson::find($lid);
		if($lesson->user_id == $uid)
		{
			$hotspot = Hotspot::findOrFail($hid);
			$this->layout->content = View::make('hotspot.profile')->with('hotspot', $hotspot);
		} else {
			return "You don't have access!";
		}
	}

	public function edit($uid, $lid, $hid)
	{
		$user = User::find($uid);
		$lesson = Lesson::find($lid);
		$hotspot = Hotspot::find($hid);
		if(!$user->id == $lesson->user_id
			or !$lesson->id == $hotspot->lesson_id){
			return "Not authorized";
		}
		return View::make('hotspot.edit')->with('user', $user)
															       ->with('lesson', $lesson)
															       ->with('hotspot', $hotspot);
	}

	public function update($uid, $lid, $hid)
	{
		$user = User::find($uid);
		$lesson = Lesson::find($lid);
		// authorization
		if(!$user->id == $lesson->user_id){
			return "Not authorized";
		}
		// validation
		$rules = array('title'       => 'required'
		 							,'description' => 'required'
		 							,'longitude'   => 'required | integer | between:-180,180'
		 							,'latitude'    => 'required | integer | between:-180,180');
		$validator = Validator::make(Input::all(), $rules);
		if($validator->fails())
		{
			return "Edit lesson failed";
		} else {
			if(!$lesson->user_id == $uid){
				return "Not authorized!";
			}
			$hotspot = Hotspot::find($hid);
			$hotspot->title = Input::get('title');
			$hotspot->description = Input::get('description');
			$hotspot->longitude = Input::get('longitude');
			$hotspot->latitude = Input::get('latitude');
			$hotspot->save();
			return "Edit success!";
		}
	}

	public function destroy($uid, $lid, $hid)
	{
		Hotspot::destroy($hid);
		return "delete success";
	}

}