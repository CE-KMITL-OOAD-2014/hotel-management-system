@extends('layouts.master')

@section('title')
@parent
:: My Staff
@stop

@section('content')
<h1>This is  request</h1>


    <!-- Login & Register button -->
    <div class="control-group">
        <div class="controls">
<?php $user=User::find(Auth::id());?>


    @foreach($user->Hotels as $hotel)
    	<h3>{{ $hotel->name  }}</h3>
    	@foreach($hotel->requestUsers as $member)
    	<li>
    		{{ $member->name }}
    		{{ HTML::link('accept/'.$hotel->id.'/'.$member->id, 'accept') }}
            {{ HTML::link('decline/'.$hotel->id.'/'.$member->id, 'decline') }}
        </li>
    	@endforeach
    @endforeach


        </div>
    </div>
@stop