@extends('layouts.master')

@section('title')
@parent
::Hotel
@stop

@section('content')
<h1>This is my hotel!</h1>


<!-- Staff can't create hotel -->
@if(!Authority::getCurrentUser()->hasRole('staff'))
    {{ HTML::link('create_hotel', 'Create hotel') }}
    @endif


<?php $users=User::find(Auth::id());?>
<!-- Manager can Edit his hotels-->
@if(Authority::getCurrentUser()->hasRole('manager'))
    @foreach($users->hotels as $hotel)
    <li>
        {{ HTML::link('hotel/'.$hotel->id, $hotel->name ) }}
    	{{ $hotel->address}}
    	{{ $hotel->tel}}
        {{ HTML::link('edit_hotel/'.$hotel->id,'edit' ) }}
    </li>
    @endforeach
<!-- Staff can see detail hotel -->
@elseif(Authority::getCurrentUser()->hasRole('staff'))
    @foreach($users->hotels as $hotel)
    <li>
        <!-- check permission staff can view room-->
        @if($users->permissions->view_room==1)
            <!--show url to room-->
            {{ HTML::link('hotel/'.$hotel->id, $hotel->name ) }}
        @else 
            <!--show text-->
            {{$hotel->name }}
        @endif
        {{ $hotel->address}}
        {{ $hotel->tel}}
    </li>
    @endforeach
<!-- Member can sent request for apply to staff of hotel -->
@else
@foreach($hotels as $hotel)
    <li>
        {{$hotel->name }}
        {{$hotel->address}}
        {{$hotel->tel}}
        {{HTML::link('join_hotel/'.$hotel->id, 'Join') }}
    </li>
    @endforeach
@endif

@stop