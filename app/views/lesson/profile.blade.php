<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<div class="row-fluid">
	<div class="col-xs-9">
		<h4>{{ $lesson->title }}</h4>
		<p>{{ $lesson->description }}</p>
		<br>
		{{ Form::open(['route'=>['user.lesson.edit', $user->id, $lesson->id]
									,'class'=>'form'
									,'method'=>'GET']); }}
		{{ Form::submit('Edit', ['class'=>'btn btn-default btn-block']) }}
		{{ Form::close(); }}
	</div>
	<div class="col-xs-3">
		<img class="img-responsive img-rounded" src="http://bioweb.uwlax.edu/bio203/s2014/mccrea_matt/c0162a3ddc0467e8a2839ad59910595b_southern_Cassowary_bird.jpg" alt="It's a picture of a cassowary" height="100" width="100">
	</div>
</div>