<div class="row">
	<div class="col-xs-4">
		<!-- FORM TO GET BACK TO LESSONS INDEX! -->
		<button class="btn btn-primary">
			<span class="glyphicon glyphicon-chevron-left"></span>
		</button>
	</div>
	<div class="col-xs8">
		<h4>Back to Lessons</h4>
	</div>
</div>
<hr>

@foreach ($hotspots as $hotspot)
	@include('hotspot.profile', ['user'=>$user, 'lesson'=>$lesson, 'hotspot'=>$hotspot])
@endforeach