@extends('layouts.master')

@section('title')
@parent
:: My Staff
@stop

@section('content')
<h1>This is  my staff</h1>
<p>This page is created using a master template.</p>

<?php $users=User::find(Auth::id());?>
@if(Authority::getCurrentUser()->hasRole('manager'))
    @foreach($users->hotels as $hotel)
    	<li>{{ $hotel->name  }}

</li>
    @endforeach
   @endif
    <!-- Login & Register button -->
    <div class="control-group">
        <div class="controls">

        </div>
    </div>
@stop