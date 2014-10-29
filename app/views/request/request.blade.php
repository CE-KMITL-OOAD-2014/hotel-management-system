@extends('layouts.master')

@section('title')
@parent
:: My Staff
@stop

@section('content')
<h1>This is  request</h1>
<p>This page is created using a master template.</p>

    <!-- Login & Register button -->
    <div class="control-group">
        <div class="controls">

            {{ HTML::link('#', 'accept') }}
            {{ HTML::link('#', 'decline') }}
        </div>
    </div>
@stop