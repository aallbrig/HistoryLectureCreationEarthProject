<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<div class="col-xs-4">
<div class="panel panel-default">
  <div class="panel-body">
    {{ Form::model($hotspot, array('route' => ['user.lesson.hotspot.update', $user->id, $lesson->id, $hotspot->id]
															,'files'=>true
															,'method'=>'PUT')); }}
			{{ Form::label('title', 'Title of lesson'); }}
			{{ Form::text('title', '', ['class'=>'form-control']); }}
		<hr>
		{{ Form::label('description', 'Description of lesson'); }}
		<br>
		{{ Form::textarea('description', '', ['class'=>'form-control']); }}
		<div class="col-xs-4">
			{{ Form::label('longitude', 'Longitude'); }}
			{{ Form::text('longitude','',['class'=>'form-control']); }}
		</div>
		<div class="col-xs-4">
			{{ Form::label('latitude', 'Latitude'); }}
			{{ Form::text('latitude','',['class'=>'form-control']); }}
		</div>
		<div class="col-xs-4">
			{{ Form::label('altitude', 'Altitude'); }}
			{{ Form::text('altitude','',['class'=>'form-control']); }}
		</div>
		<div class="col-xs-12">
			{{ Form::label('image', 'Image for hotspot'); }}
			{{ Form::file('image'); }}
			<hr>
		</div>
		<div class="col-xs-8">
			{{ Form::submit('Submit Edit Lesson', ['class'=>'btn btn-primary form-control']); }}
		{{ Form::close(); }}
		</div>
		<div class="col-xs-4">
			{{ Form::open(array('route' => ['user.lesson.hotspot.destroy', $user->id, $lesson->id, $hotspot->id]
																		,'method'=>'DELETE')); }}
				{{ Form::submit('Delete', ['class'=>'btn btn-default form-control']); }}
			{{ Form::close(); }}
		</div>
  </div>
</div>
</div>