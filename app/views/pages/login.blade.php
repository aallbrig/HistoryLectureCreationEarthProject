@extends('layouts.master')
@section('styles')
{{ HTML::style('css/login.css'); }}
@stop

@section('content')
<div class="col-xs-6 col-xs-offset-3 panel panel-default  down125">
  <div class="panel-body">
  	@if(isset($message))
			<div class="alert alert-danger">
				{{ $message }}
			</div>
  	@endif
		{{ Form::open(array('url' => 'login')) }}
			<div class="form-group">
				{{ Form::label('username', 'Username', ['class'=>'']) }}
				{{ Form::text('username', '', ['class'=>'form-control']) }}
			</div>
			<div class="form-group">
				{{ Form::label('password', 'Password', ['class'=>'']) }}
				{{ Form::password('password', ['class'=>'form-control']) }}
			</div>
			{{ Form::submit('Login', ['class'=>'btn btn-primary form-control'])}}
		{{ Form::close() }}
		<hr>
		<a id="register" href="{{ $url }}">Register</a>
  </div>
</div>
<div id="registerModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        {{ $registerForm }}
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop

@section('scripts')
{{ HTML::script('js/login.js'); }}
@stop