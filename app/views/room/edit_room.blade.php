@extends('layouts.master')

@section('title')
@parent
:: Create Room
@stop

@section('content')

{{ Form::open(array('url' => 'edit_room/'.$hotel_id->id.'/'.$room_id->id, 'class' => 'form-horizontal')) }}
<!--Only manager can edit room -->


        <h3>{{ $hotel_id->name  }}</h3>
        <b>Room Detail</b><br>
        {{ "Room Number :".$room_id->roomnumber}}<br>
        {{" Price : ".$room_id->price}}<br>
        {{ "Detail :".$room_id->detail}}<br>
    
{{ HTML::link('delete_room/'.$hotel_id->id.'/'.$room_id->id,'Delete Room' ) }}

    <!-- Roomnumber -->
    <div class="control-group {{{ $errors->has('roomnumber') ? 'error' : '' }}}">
        {{ Form::label('roomnumber', 'Roomnumber', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('roomnumber', $room_id->roomnumber) }}
            {{ $errors->first('roomnumber') }}
        </div>
    </div>

    <!-- Price -->
    <div class="control-group {{{ $errors->has('price') ? 'error' : '' }}}">
        {{ Form::label('price', 'Price', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('price', $room_id->price) }}
            {{ $errors->first('price') }}
        </div>
    </div>

    <!-- detail -->
    <div class="control-group {{{ $errors->has('detail') ? 'error' : '' }}}">
        {{ Form::label('detail', 'Detail.', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::textarea('detail', $room_id->detail) }}
            {{ $errors->first('detail') }}
        </div>
    </div>
    <!-- Submit button -->
    <div class="control-group">
        <div class="controls">
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </div>
    </div>

@stop