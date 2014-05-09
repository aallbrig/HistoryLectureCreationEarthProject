{{ Form::open(array('route' => 'user.store')); }}
	{{ Form::label('email', 'Email'); }}
	{{ Form::text('email'); }}
	<br>
	{{ Form::label('username', 'Username'); }}
	{{ Form::text('username'); }}
	<br>
	{{ Form::label('password', 'Password'); }}
	{{ Form::password('password'); }}
	<br>
	{{ Form::submit('Create New User'); }}
{{ Form::close(); }}