{{ Form::open(array('route' => 'user.store')); }}
	<div class="form-group">
		{{ Form::label('email', 'Email'); }}
		{{ Form::text('email', '', ['class'=>'form-control']); }}
	</div>
	<div class="form-group">
		{{ Form::label('username', 'Username'); }}
		{{ Form::text('username', '', ['class'=>'form-control']); }}
	</div>
	<div class="form-group">
		{{ Form::label('password', 'Password'); }}
		{{ Form::password('password', ['class' => 'form-control']); }}
	</div>
	{{ Form::submit('Create New User', ['class' => 'btn btn-primary form-control']); }}
{{ Form::close(); }}