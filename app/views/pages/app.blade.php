@extends('layouts.master')
@section('styles')
{{ HTML::style('css/app.css'); }}
@stop

@section('content')
<div class="row-fluid">
	<div id="sidebar" class="col-xs-4">
		{{ $lessons }}
		{{ Form::open(['url'=>'/logout'])}}
			{{ Form::submit('Logout', ['class'=>'btn btn-primary form-control'])}}
		{{ Form::close() }}
	</div>
	<div class="col-xs-8">
		<div id="map3d"></div>
	</div>
</div>
@stop

@section('scripts')
{{ HTML::script('js/app.js'); }}
@stop