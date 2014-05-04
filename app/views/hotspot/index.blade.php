<hr>
<div class="row">
	<div class="col-xs-4">
		<!-- FORM TO GET BACK TO LESSONS INDEX! -->
		{{ Form::open(['route'=>['user.lesson.index', $user->id]
										,'method'=>'GET']); }}
			<button type="submit" class="b2l btn btn-primary">
				<span class="glyphicon glyphicon-chevron-left"></span>
			</button>
		{{ Form::close(); }}
	</div>
	<div class="col-xs8">
		<h4>Back to Lessons</h4>
	</div>
</div>
<hr>

@foreach ($hotspots as $hotspot)
	@include('hotspot.profile', ['user'=>$user, 'lesson'=>$lesson, 'hotspot'=>$hotspot])
@endforeach