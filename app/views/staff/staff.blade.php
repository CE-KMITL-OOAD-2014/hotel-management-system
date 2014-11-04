@extends('layouts.master')

@section('title')
@parent
:: My Staff
@stop

@section('content')
<h1>This is  my staff</h1>

<?php $user=User::find(Auth::id());?>

@if(Authority::getCurrentUser()->hasRole('manager'))
    @foreach($user->hotels as $hotel)
    	<h3>{{ $hotel->name  }}</h3>
    	@foreach($hotel->users as $user_id)
        @if($user_id->hasRole('manager'))
    	{{"Manager name : ". $user_id->name." ".$user_id->lastname }}<br>
        <b>Staff</b><br>
        @elseif($user_id->hasRole('staff'))
        {{ $user_id->name ." ".$user_id->lastname." "}}
        {{ HTML::link('edit_permission/'.$hotel->id.'/'.$user_id->id, 'Edit permissions') }}
        <br>
 
        @endif
    	@endforeach
    @endforeach

@endif

@stop