{{ Form::open(array('route' => 'user.store')); }}
	{{ Form::label('email', 'Email'); }}
	{{ Form::text('email'); }}
	{{ Form::label('username', 'Username'); }}
	{{ Form::text('username'); }}
	{{ Form::label('password', 'Password'); }}
	{{ Form::password('password'); }}
	{{ Form::submit('Create New User'); }}
{{ Form::close(); }}