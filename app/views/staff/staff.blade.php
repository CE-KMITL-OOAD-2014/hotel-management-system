@extends('layouts.master')

@section('title')
@parent
:: My Staff
@stop

@section('content')
<h1>This is  my staff</h1>
<p>This page is created using a master template.</p>

<?php $user=User::find(Auth::id());?>

@if(Authority::getCurrentUser()->hasRole('manager'))
    @foreach($user->hotels as $hotel)
    	<h3>{{ $hotel->name  }}</h3>
    	@foreach($hotel->users as $user_id)
        @if($user_id->hasRole('manager'))
    	{{"Manager name : ". $user_id->name." ".$user_id->lastname }}<br>
        <b>Staff</b><br>
        @elseif($user_id->hasRole('staff'))
        {{ $user_id->name ." ".$user_id->lastname}}
<div class="checkbox-inline text-right">
    <label class ="checkbox-inline text-right">
      <input type="checkbox"> View room
    </label>
       <label class ="checkbox-inline text-right">
      <input type="checkbox"> Edit room
    </label>
       <label class ="checkbox-inline text-right">
      <input type="checkbox"> View guest
    </label>
       <label class ="checkbox-inline text-right">
      <input type="checkbox"> Edit guest
    </label>
  </div>
  <br>
        @endif
    	@endforeach
    @endforeach
@elseif(Authority::getCurrentUser()->hasRole('staff'))
 	@foreach($user->hotels as $hotel)
    	<li>{{ $hotel->name  }}</li>
    	@foreach($hotel->users as $user_id)
    	<li>{{ $user_id->name }}</li>
    	@endforeach
    @endforeach
@endif
    <!-- Login & Register button -->
    <div class="control-group">
        <div class="controls">

        </div>
    </div>
@stop