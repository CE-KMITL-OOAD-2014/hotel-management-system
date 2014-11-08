@extends('layouts.master')

@section('title')
@parent
:: My guest
@stop

@section('content')
<h1>This is my guest</h1>

<?php $users=User::find(Auth::id());?>
<!--manager can see all guest in his hotels-->
@if($users->role == 'manager')
    <!--show all hotel manager -->
    @foreach($users->hotels as $hotel)
        <h3> {{ $hotel->name  }}</h3>
        {{ HTML::link('create_guest/'.$hotel->id, 'Create guest') }}
         <!--show all guest each hotel-->
        @foreach($hotel->guests as $user_id)
        <li>
            {{ $user_id->name }}
            {{ HTML::link('edit_guest/'.$hotel->id.'/'.$user_id->id, 'Edit guest') }}
        </li>
        @endforeach 
    @endforeach
<!--staff can see all guest in his hotel-->
@elseif($users->permissions->view_guest==1)
     <!--show  hotel staff -->
    @foreach($users->hotels as $hotel)
        <h3>{{ $hotel->name  }}</h3>
         <!--check  permission staff can create guest-->
        @if($users->permissions->manage_guest==1 )
            {{ HTML::link('create_guest/'.$hotel->id, 'Create guest') }}
        @endif
         <!--show all guest in hotel-->
        @foreach($hotel->guests as $user_id)
            <li>
            {{ $user_id->name }}
             <!--check  permission staff can create guest-->
            @if($users->permissions->manage_guest==1 )
                {{ HTML::link('edit_guest/'.$hotel->id.'/'.$user_id->id, 'Edit guest') }}
            @endif
            </li>
        @endforeach
    @endforeach
@endif

@stop

