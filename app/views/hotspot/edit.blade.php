{{ Form::model($hotspot, array('route' => ['user.lesson.hotspot.update', $user->id, $lesson->id, $hotspot->id]
															,'files'=>true
															,'method'=>'PUT')); }}
	{{ Form::label('title', 'Title of lesson'); }}
	{{ Form::text('title'); }}

	{{ Form::label('description', 'Description of lesson'); }}
	{{ Form::textarea('description'); }}

	{{ Form::label('image', 'Image for hotspot'); }}
	{{ Form::file('image'); }}

	{{ Form::label('longitude', 'Longitude of hotspot'); }}
	{{ Form::text('longitude'); }}

	{{ Form::label('latitude', 'Latitude of hotspot'); }}
	{{ Form::text('latitude'); }}

	{{ Form::submit('Submit Edit Lesson'); }}
{{ Form::close(); }}

{{ Form::open(array('route' => ['user.lesson.hotspot.destroy', $user->id, $lesson->id, $hotspot->id]
															,'method'=>'DELETE')); }}
	{{ Form::submit('Delete Lesson'); }}
{{ Form::close(); }}