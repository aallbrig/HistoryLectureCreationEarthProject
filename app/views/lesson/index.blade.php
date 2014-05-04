@foreach ($lessons as $lesson)
	@include('lesson.profile', ['user'=>$user, 'lesson'=>$lesson])
@endforeach