@extends('layouts.master')

@section('title')
@parent
:: My room
@stop

@section('content')
<h1>This is my room!</h1>
    <!-- Login & Register button -->
<?php 
    $hotels=Hotel::find($hotel_id);
    $user = User::find(Auth::id());
?>
@if(Authority::getCurrentUser()->hasRole('manager'))
    {{ HTML::link('create_room/'.$hotel_id, 'Create room') }}
    @foreach($hotels->rooms as $room)
        @foreach($room->statusrooms as $status)
            <li>
            {{ $room->roomnumber}}
            {{ $room->price}}
            {{ $room->detail}}
            {{ $status->name}}
            {{ HTML::link('edit_room/'.$hotel_id.'/'.$room->id, 'Edit room') }}
            {{ HTML::link('empty','Empty')}}
            {{ HTML::link('occupied', 'Occupied') }}
            {{ HTML::link('reserved', 'Reserved') }}
            {{ HTML::link('maintenance', 'Maintenance') }}
            </li>
            @endforeach
        @endforeach 
@elseif($user->permissions->view_room==1)
    @foreach($hotels->rooms as $room)
        @foreach($room->statusrooms as $status)
            <li>
            {{ $room->roomnumber}}
            {{ $room->price}}
            {{ $room->detail}}
            {{ $status->name}}            
            @if($user->permissions->manage_room==1 )
                {{ HTML::link('edit_room/'.$hotel_id.'/'.$room->id, 'Edit room') }}
                {{ HTML::link('empty','Empty')}}
                {{ HTML::link('occupied', 'Occupied') }}
                {{ HTML::link('reserved', 'Reserved') }}
                {{ HTML::link('maintenance', 'Maintenance') }}
                </li>
                @endif
        @endforeach
    @endforeach
@endif
@stop