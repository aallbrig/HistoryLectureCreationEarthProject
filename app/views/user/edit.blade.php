<div class="row">
	<div class="col-xs-2">
		{{ Form::open(['route'=>['user.show',$user->id]
									,'method'=>'GET']); }}
			<button type="submit" class="b2u btn btn-primary">
				<span class="glyphicon glyphicon-chevron-left"></span>
			</button>
		{{ Form::close(); }}
	</div>
	<div class="col-xs-10">
		{{ Form::model($user, array('route' => array('user.update', $user->id)
															 ,'method'=>'PUT')); }}
			{{ Form::label('email', 'Email'); }}
			{{ Form::text('email'); }}
			{{ Form::label('username', 'Username'); }}
			{{ Form::text('username'); }}
			{{ Form::label('password', 'Password'); }}
			{{ Form::password('password'); }}
			{{ Form::submit('Edit User'); }}
		{{ Form::close(); }}

		{{ Form::open(array('route' => array('user.destroy', $user->id)
											 ,'method'=>'DELETE'))}}
			{{ Form::submit('Delete User'); }}
		{{ Form::close(); }}
	</div>
</div>