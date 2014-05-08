<div class="row">
	<div class="col-xs-9">
		<h3 class="text-center">User: {{ $user->username }}</h3>
		<br>
		{{ Form::open(['route'=>['user.edit',$user->id]
									,'class'=>'form'
									,'method'=>'GET']); }}
		{{ Form::submit('Manage Account', ['class'=>'manage btn btn-primary btn-sm btn-block']) }}
		{{ Form::close(); }}
		{{ Form::open(['url'=>'/logout'])}}
			{{ Form::submit('Logout', ['class'=>'btn btn-primary btn-sm btn-block'])}}
		{{ Form::close() }}
	</div>
	<div class="col-xs-3">
		<img class="img-responsive img-rounded" src="http://bioweb.uwlax.edu/bio203/s2014/mccrea_matt/c0162a3ddc0467e8a2839ad59910595b_southern_Cassowary_bird.jpg" alt="It's a picture of a cassowary" height="100" width="100">
	</div>
</div>