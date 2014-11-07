@extends('layouts.master')

@section('title')
@parent
:: My Staff
@stop

@section('content')
<h1>This is  request</h1>

<!-- only manager can accept and decline request -->
@if(Authority::getCurrentUser()->hasRole('manager'))

<?php $user=User::find(Auth::id());?>

    @foreach($user->Hotels as $hotel)
        <!-- show all his hotels -->
    	<h3>{{ $hotel->name  }}</h3>
    	@foreach($hotel->requestUsers as $member)
    	<li>
            <!-- show member require for each hotel -->
    		{{ $member->name }}
    		{{ HTML::link('accept/'.$hotel->id.'/'.$member->id, 'accept') }}
            {{ HTML::link('decline/'.$hotel->id.'/'.$member->id, 'decline') }}
        </li>
    	@endforeach
    @endforeach
@endif
@stop