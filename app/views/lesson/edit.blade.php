<div id="{{$lesson->id}}">
{{ Form::model($lesson, array('route' => array('user.lesson.update', $user->id, $lesson->id)
													   ,'method'=>'PUT'
													   ,'data-id' => $lesson->id)); }}
	{{ Form::label('title', 'Title'); }}
	{{ Form::text('title'); }}
	{{ Form::label('description', 'Description'); }}
	{{ Form::textarea('description', '', ['class'=>'form-control']); }}
	{{ Form::submit('Edit Lesson', ['class'=>'edit btn btn-primary form-control']); }}
{{ Form::close(); }}

{{ Form::open(array('route' => array('user.lesson.destroy', $user->id, $lesson->id)
									 ,'method'=>'DELETE'
									 ,'data-id' => $lesson->id))}}
	{{ Form::submit('Delete Lesson', ['class'=>'delete btn btn-primary form-control']); }}
{{ Form::close(); }}

{{ Form::open(array('route' => array('user.lesson.show', $user->id, $lesson->id)
									 ,'method'=>'GET'
									 ,'data-id' => $lesson->id))}}
	{{ Form::submit('Back', ['class'=>'back btn btn-primary form-control']); }}
{{ Form::close(); }}
</div>