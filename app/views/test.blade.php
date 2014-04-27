@extends('layouts.master')
@section('styles')
{{ HTML::style('css/test.css'); }}
@stop
@section('content')
This is from test.blade.php
<br>
@foreach ($users as $user)
    <p>This is user {{ $user->id }}</p>
@endforeach

@foreach ($lessons as $lesson)
	<p>This is {{ $lesson->id }} lesson</p>
@endforeach

@foreach ($hotspots as $hotspot)
	<p>This is {{ $hotspot->id }} hotspot</p>
	<pre>{{ var_dump($hotspot); }} </pre>
@endforeach
@stop

@section('scripts')
{{ HTML::script('js/test.js'); }}
@stop