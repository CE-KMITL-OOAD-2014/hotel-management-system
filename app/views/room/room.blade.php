@extends('layouts.master')

@section('title')
@parent
:: My room
@stop

@section('content')
<h1>This is my room!</h1>
    <!-- Login & Register button -->
    <div class="control-group">
        <div class="controls">
@if(Authority::getCurrentUser()->hasRole('manager'))
            {{ HTML::link('create_room/'.$hotel_id, 'Create room') }}
            @endif
        </div>
    </div>
    <?php 
    $hotels=Hotel::find($hotel_id);
    $user = User::find(Auth::id());
    ?>
      @foreach($hotels->rooms as $room)
        @foreach($room->statusrooms as $status)
        <li>{{ $room->roomnumber}}
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
@stop