@extends('layouts.master')

@section('title')
@parent
:: My guest
@stop

@section('content')
<h1>This is my guest</h1>

    <!-- Login & Register button -->
    <div class="control-group">
        <div class="controls">

            {{ HTML::link('create_guest', 'Create guest') }}
        </div>
    </div>


<?php $users=User::find(Auth::id());?>
@if(Authority::getCurrentUser()->hasRole('manager'))
    @foreach($user->hotels as $hotel)
        <li>{{ $hotel->name  }}</li>
        @foreach($hotel->users as $user_id)
        <li>{{ $user_id->name }}</li>
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
@stop
