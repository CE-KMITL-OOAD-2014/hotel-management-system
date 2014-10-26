@extends('layouts.master')

@section('title')
@parent
:: My hotel
@stop

@section('content')
<h1>This is my hotel!</h1>
<p>This page is created using a master template.</p>

    <!-- Login & Register button -->
    <div class="control-group">
        <div class="controls">

            {{ HTML::link('create_room', 'Create hotel') }}
            {{ HTML::link('edit_room', 'Edit room') }}
            {{ HTML::link('check_in', 'Check in') }}
            {{ HTML::link('check_out', 'Check out') }}
        </div>
    </div>
      @foreach($rooms as $room)
    	<li>{{ $room->roomnumber}}
    	{{ $room->price}}
    	{{ $room->detail}}
        {{ HTML::link('edot_room', 'Edit room') }}
        {{ HTML::link('check_in', 'Check in') }}
        {{ HTML::link('check_out', 'Check out') }}
</li>
    
    @endforeach
@stop