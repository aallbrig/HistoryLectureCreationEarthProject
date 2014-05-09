<div id="{{ $hotspot->id }}" class="panel panel-default">
  <div class="panel-body">
    <div class="col-xs-9">
			<h4>{{ $hotspot->title }}</h4>
			<p>{{ $hotspot->description }}</p>
		</div>
		<div class="col-xs-3">
			<img class="img-responsive img-rounded" src="http://bioweb.uwlax.edu/bio203/s2014/mccrea_matt/c0162a3ddc0467e8a2839ad59910595b_southern_Cassowary_bird.jpg" alt="It's a picture of a cassowary" height="100" width="100">
		</div>
		<div class="col-xs-8">
			<div class="view btn btn-primary btn-block"
					 data-longitude="{{ $hotspot->longitude }}"
					 data-latitude ="{{ $hotspot->latitude  }}"
					 data-altitude ="{{ $hotspot->altitude  }}">View</div>
		</div>
		<div class="col-xs-4">
			{{ Form::open(['route'=>['user.lesson.hotspot.edit', $user->id, $lesson->id, $hotspot->id]
										,'class'=>'form'
										,'method'=>'GET'
										,'data-id'=>$hotspot->id]); }}
			{{ Form::submit('Edit', ['class'=>'editH btn btn-default form-control']); }}
			{{ Form::close(); }}
		</div>
  </div>
</div>