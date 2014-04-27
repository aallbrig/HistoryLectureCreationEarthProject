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