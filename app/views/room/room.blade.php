@extends('layouts.master')

@section('title')
@parent
:: My room
@stop

@section('content')
<h1>This is my room!</h1>

<?php echo "My hotel id is :".$hotel_id;?>
    <!-- Login & Register button -->
    <div class="control-group">
        <div class="controls">

            {{ HTML::link('create_room/'.$hotel_id, 'Create room') }}
            {{ HTML::link('edit_room', 'Edit room') }}
            {{ HTML::link('check_in', 'Check in') }}
            {{ HTML::link('check_out', 'Check out') }}
        </div>
    </div>
    <?php $hotels=Hotel::find($hotel_id);?>
      @foreach($hotels->rooms as $room)
        @foreach($room->statusrooms as $status)
        <li>{{ $room->roomnumber}}
        {{ $room->price}}
        {{ $room->detail}}
        {{ $status->name}}
            {{ HTML::link('empty','Empty')}}
            {{ HTML::link('occupied', 'Occupied') }}
            {{ HTML::link('reserved', 'Reserved') }}
            {{ HTML::link('maintenance', 'Maintenance') }}
</li>
        @endforeach
    @endforeach
@stop