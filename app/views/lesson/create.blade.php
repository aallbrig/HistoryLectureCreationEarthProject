{{ Form::open(array('route' => ['user.lesson.store', $uid])); }}
	{{ Form::label('title', 'Title of lesson'); }}
	{{ Form::text('title'); }}
	{{ Form::label('description', 'Description of lesson'); }}
	{{ Form::textarea('description'); }}
	{{ Form::submit('Create New Lesson'); }}
{{ Form::close(); }}