<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

{{ Form::model($lesson, array('route' => array('user.lesson.update', $user->id, $lesson->id)
													   ,'method'=>'PUT')); }}
	{{ Form::label('title', 'Title'); }}
	{{ Form::text('title'); }}
	{{ Form::label('description', 'Description'); }}
	{{ Form::textarea('description'); }}
	{{ Form::submit('Edit Lesson'); }}
{{ Form::close(); }}

{{ Form::open(array('route' => array('user.lesson.destroy', $user->id, $lesson->id)
									 ,'method'=>'DELETE'))}}
	{{ Form::submit('Delete Lesson'); }}
{{ Form::close(); }}