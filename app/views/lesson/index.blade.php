<hr>
<div class="row">
	<div class="col-xs-8 col-xs-offset-2">
		{{ Form::open(['route'=>['user.lesson.create', $user->id]
									,'method'=>'GET']); }}
		{{ Form::submit('Create new lesson', ['class'=>'createL btn btn-primary form-control'])}}
		{{ Form::close(); }}
	</div>
</div>
<hr>
<div id="lessonsContainer">
	@foreach ($lessons as $lesson)
		@include('lesson.profile', ['user'=>$user, 'lesson'=>$lesson])
	@endforeach
</div>