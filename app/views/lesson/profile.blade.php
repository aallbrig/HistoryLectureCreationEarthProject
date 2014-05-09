<div id="{{ $lesson->id }}" class="panel panel-default">
  <div class="panel-heading">
		<h4>{{ $lesson->title }}</h4>
  </div>
  <div class="panel-body">
    <div class="col-xs-9">
			<p>{{ $lesson->description }}</p>
		</div>
		<div class="col-xs-3">
			<img class="img-responsive img-rounded" src="http://bioweb.uwlax.edu/bio203/s2014/mccrea_matt/c0162a3ddc0467e8a2839ad59910595b_southern_Cassowary_bird.jpg" alt="It's a picture of a cassowary" height="100" width="100">
		</div>
		<hr>
		<div class="col-xs-8">
			{{ Form::open(['route'=>['user.lesson.hotspot.index', $user->id, $lesson->id]
										,'method'=>'GET']); }}
				<button type="submit" data-header-url="user/{{$user->id}}/lesson/{{$lesson->id}}/header" class="present btn btn-sm btn-primary form-control">Present</button>
			{{ Form::close(); }}
		</div>
		<div class="col-xs-4">
			{{ Form::open(['route'=>['user.lesson.edit', $user->id, $lesson->id]
										,'method'=>'GET'
										,'data-id'=>$lesson->id]); }}
			{{ Form::submit('Edit', ['class'=>'editL btn btn-default btn-sm form-control']); }}
			{{ Form::close(); }}
		</div>
  </div>
</div>