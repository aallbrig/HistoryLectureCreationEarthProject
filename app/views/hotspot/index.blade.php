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
	<div class="col-xs-8">
		<h4>Back to Lessons</h4>
	</div>
	<div class="col-xs-8 col-xs-offset-2">
		{{ Form::open(['route'=>['user.lesson.hotspot.create', $user->id, $lesson->id]
									,'method'=>'GET']); }}
			<button class="createH btn btn-primary">Create new hotspot</button>
		{{ Form::close(); }}
	</div>
</div>
<hr>
<div id="hotspotsContainer">
	@foreach ($hotspots as $hotspot)
		@include('hotspot.profile', ['user'=>$user, 'lesson'=>$lesson, 'hotspot'=>$hotspot])
	@endforeach
</div>