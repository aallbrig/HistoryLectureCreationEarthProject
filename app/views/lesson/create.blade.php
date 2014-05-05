<div class="row">	
{{ Form::open(array('route' => ['user.lesson.store', $uid])); }}
	{{ Form::label('title', 'Title of lesson'); }}
	{{ Form::text('title','',['class'=>'form-control']); }}
	{{ Form::label('description', 'Description of lesson'); }}
	{{ Form::textarea('description','',['class'=>'form-control']); }}
	{{ Form::submit('Create New Lesson',['class'=>'create btn btn-primary form-control']); }}
{{ Form::close(); }}
</div>