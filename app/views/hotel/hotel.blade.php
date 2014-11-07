@extends('layouts.master')

@section('title')
@parent
::Hotel
@stop

@section('content')
<h1>This is my hotel!</h1>



@if(!Authority::getCurrentUser()->hasRole('staff'))
    {{ HTML::link('create_hotel', 'Create hotel') }}
    @endif


<?php $users=User::find(Auth::id());?>
@if(Authority::getCurrentUser()->hasRole('manager'))
    @foreach($users->hotels as $hotel)
    	<li>{{ HTML::link('hotel/'.$hotel->id, $hotel->name ) }}
    	{{ $hotel->address}}
    	{{ $hotel->tel}}
        {{ HTML::link('edit_hotel/'.$hotel->id,'edit' ) }}
    </li>
    @endforeach
@elseif(Authority::getCurrentUser()->hasRole('staff'))
    @foreach($users->hotels as $hotel)
        <li>{{ HTML::link('hotel/'.$hotel->id, $hotel->name ) }}
        {{ $hotel->address}}
        {{ $hotel->tel}}
    </li>
    @endforeach
@else
@foreach($hotels as $hotel)
        <li>{{$hotel->name }}
        {{ $hotel->address}}
        {{ $hotel->tel}}
         {{ HTML::link('join_hotel/'.$hotel->id, 'Join') }}
</li>
    @endforeach
@endif
@stop