<div class="row">
{{ Form::open(array('route' => ['user.lesson.hotspot.store', $user->id, $lesson->id]
									 ,'files'=>true
									 ,'data-index' => $url)); }}
	{{ Form::label('title', 'Title of hotspot'); }}
	{{ Form::text('title'); }}

	{{ Form::label('description', 'Description of hotspot'); }}
	{{ Form::textarea('description'); }}

	{{ Form::label('image', 'Image for hotspot'); }}
	{{ Form::file('image'); }}

	{{ Form::label('longitude', 'Longitude of hotspot'); }}
	{{ Form::text('longitude'); }}

	{{ Form::label('latitude', 'Latitude of hotspot'); }}
	{{ Form::text('latitude'); }}

	{{ Form::label('altitude', 'Altitude of hotspot'); }}
	{{ Form::text('altitude'); }}

	{{ Form::submit('Create New Hotspot', ['class'=>'create btn btn-primary form-control']); }}
{{ Form::close(); }}
</div>