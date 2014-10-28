@extends('layouts.master')

@section('title')
@parent
:: My room
@stop

@section('content')
<h1>This is my room!</h1>
<p>This page is created using a master template.</p>

<?php echo $hotel_id;?>
    <!-- Login & Register button -->
    <div class="control-group">
        <div class="controls">

            {{ HTML::link('create_room', 'Create room') }}
            {{ HTML::link('edit_room', 'Edit room') }}
            {{ HTML::link('check_in', 'Check in') }}
            {{ HTML::link('check_out', 'Check out') }}
        </div>
    </div>
    <?php $hotels=Hotel::find($hotel_id);?>
      @foreach($hotels->rooms as $room)
        <li>{{ $room->roomnumber}}
        {{ $room->price}}
        {{ $room->detail}}

        {{ HTML::link('edit_room', 'Edit room') }}
        {{ HTML::link('check_in', 'Check in') }}
        {{ HTML::link('check_out', 'Check out') }}
</li>
    
    @endforeach
@stop