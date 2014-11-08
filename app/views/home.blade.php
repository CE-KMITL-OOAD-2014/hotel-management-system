@extends('layouts.master')

@section('title')
@parent
:: Home
@stop

@section('content')
<h1>Hotel management system</h1>
<h2>Featrue :</h2>

<?php
if(Auth::check()){
	if( Authority::can('manage', 'all') ) {
		echo 'You are admin id: ';
		echo Auth::id();
	}elseif (Authority::can('moderate', 'User')) {
		echo 'You are member id: ';
		echo Auth::id();
	}
	foreach(User::all() as $user)
	{
		echo $user->id;
	}
}

?>
@stop