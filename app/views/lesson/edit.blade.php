{{ Form::model($lesson, array('route' => array('user.lesson.update', $user->id, $lesson->id)
													   ,'method'=>'PUT')); }}
	{{ Form::label('title', 'Title'); }}
	{{ Form::text('title'); }}
	{{ Form::label('description', 'Description'); }}
	{{ Form::textarea('description'); }}
	{{ Form::submit('Edit Lesson', ['class'=>'edit btn btn-primary form-control']); }}
{{ Form::close(); }}

{{ Form::open(array('route' => array('user.lesson.destroy', $user->id, $lesson->id)
									 ,'method'=>'DELETE'))}}
	{{ Form::submit('Delete Lesson', ['class'=>'delete btn btn-primary form-control']); }}
{{ Form::close(); }}