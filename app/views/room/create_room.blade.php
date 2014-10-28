@extends('layouts.master')

@section('title')
@parent
:: Create Room
@stop

@section('content')

<?php  echo "My hotel id is :".$hotel_id;?> <br>

{{ Form::open(array('url' => 'create_room/'.$hotel_id, 'class' => 'form-horizontal')) }}

    <!-- Roomnumber -->
    <div class="control-group {{{ $errors->has('roomnumber') ? 'error' : '' }}}">
        {{ Form::label('roomnumber', 'Roomnumber', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('roomnumber', Input::get('roomnumber')) }}
            {{ $errors->first('roomnumber') }}
        </div>
    </div>

    <!-- Price -->
    <div class="control-group {{{ $errors->has('price') ? 'error' : '' }}}">
        {{ Form::label('price', 'Price', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('price', Input::get('price')) }}
            {{ $errors->first('price') }}
        </div>
    </div>

    <!-- detail -->
    <div class="control-group {{{ $errors->has('detail') ? 'error' : '' }}}">
        {{ Form::label('detail', 'Detail.', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('detail', Input::get('detail')) }}
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