@extends('layouts.master')

@section('title')
@parent
:: My guest
@stop

@section('content')
<h1>This is my guest</h1>

    <!-- Login & Register button -->

<?php $users=User::find(Auth::id());?>
@if(Authority::getCurrentUser()->hasRole('manager'))
    @foreach($users->hotels as $hotel)
        <li>
            {{ $hotel->name  }}
            {{ HTML::link('create_guest/'.$hotel->id, 'Create guest') }}
        </li>
        @foreach($hotel->guests as $user_id)
        <li>
            {{ $user_id->name }}
            {{ HTML::link('edit_guest/'.$user_id->id, 'Edit guest') }}
        </li>
        @endforeach 
    @endforeach
@elseif($users->permissions->view_guest==1 && $users->permissions->manage_guest==0 )
    @foreach($users->hotels as $hotel)
        <li>{{ $hotel->name  }}</li>
        @foreach($hotel->guests as $user_id)
        <li>{{ $user_id->name }}</li>
        @endforeach
    @endforeach
@elseif($users->permissions->view_guest==1 && $users->permissions->manage_guest==1 )
    @foreach($users->hotels as $hotel)
        <li>
            {{ $hotel->name  }}
            {{ HTML::link('create_guest/'.$hotel->id, 'Create guest') }}
        </li>
        @foreach($hotel->guests as $user_id)
        <li>
            {{ $user_id->name }}
            {{ HTML::link('edit_guest/'.$user_id->id, 'Edit guest') }}
        </li>
        @endforeach
    @endforeach
@endif
@stop

