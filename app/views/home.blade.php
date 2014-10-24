@extends('layouts.master')

@section('title')
@parent
:: Home
@stop

@section('content')
<h1>Hello World!</h1>
<p>This page is created using a master template.</p>
<?php
if(Auth::check()){
if( Authority::can('manage', 'User') ) {
	echo 'You are admin';
    }else{echo 'You are normal user';}
}else{echo 'You have not login yet.';}
?>
@stop