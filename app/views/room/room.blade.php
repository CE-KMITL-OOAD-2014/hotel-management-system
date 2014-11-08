@extends('layouts.master')


@section('title')
@parent
:: My room
@stop

@section('content')
<h1>This is my room!</h1>

<?php 
$user = User::find(Auth::id());
?>
<!-- manager can create all rooms and all his hotels -->
@if(Authority::getCurrentUser()->hasRole('manager'))

    @foreach($user->hotels as $hotel)
        <h3>{{'hotel name : '.$hotel->name }}</h3>
        {{ HTML::link('create_room/'.$hotel->id, 'Create room') }}
        {{ HTML::link('change_room_status/'.$hotel->id, 'Change room status') }}
        @foreach($hotel->rooms as $room)
            <li>
                {{ $room->roomnumber}}
                {{ $room->price}}
                {{ $room->detail}}
            @foreach($room->statusrooms as $status)
            
                {{ $status->name}}
                {{ HTML::link('edit_room/'.$hotel->id.'/'.$room->id, 'Edit room') }}
            </li>
            @endforeach
        @endforeach 
    @endforeach
<!-- staff with permission can see rooms in his hotel -->
@elseif($user->permissions->view_room==1)
    @foreach($user->hotels as $hotel)
        @foreach($hotel->rooms as $room)
            @foreach($room->statusrooms as $status)
            <li>
                {{ $room->roomnumber}}
                {{ $room->price}}
                {{ $room->detail}}
                {{ $status->name}}            
            </li>
            @endforeach
        @endforeach
    @endforeach
@endif
@stop