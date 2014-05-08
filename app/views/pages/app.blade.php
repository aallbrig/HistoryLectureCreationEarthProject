@extends('layouts.master')
@section('styles')
{{ HTML::style('css/app.css'); }}
@stop

@section('content')
<div id="navbar" class="row-fluid">
	
</div>

<div class="row">
	<div id="userPanel" class="col-xs-4">
		@include('user.profile', ['user'=>$user])
	</div>
	<div id="topcontext" class="col-xs-8"></div>
</div>

<div class="row">
	<div id="sidebar" class="col-xs-4">
		{{ $lessons }}
	</div>
	<div class="col-xs-8">
		<div id="map3d"></div>
	</div>
</div>
@stop

@section('scripts')
{{ HTML::script('js/app.js'); }}
@stop