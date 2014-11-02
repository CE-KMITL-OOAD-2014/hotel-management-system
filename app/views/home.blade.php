@extends('layouts.master')

@section('title')
@parent
:: Home
@stop

@section('content')
<h1>This is home page!</h1>
<?php
if(Auth::check()){
	if( Authority::can('manage', 'all') ) {
		echo 'You are admin id: ';
		echo Auth::id();
	}elseif (Authority::can('moderate', 'User')) {
		echo 'You are member id: ';
		echo Auth::id();
	}
}
?>
@stop