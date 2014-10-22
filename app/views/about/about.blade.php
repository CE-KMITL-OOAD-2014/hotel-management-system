@extends('layouts.master')

@section('title')
@parent
:: About
@stop

@section('content')
<h1>About us!</h1>
<li>We are spades!!!</li>
<?php
	for($i = 1;$i<101;$i++){echo "$i<br>";}
	?>
@stop