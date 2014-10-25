@extends('layouts.master')

@section('title')
@parent
:: Create Hotel
@stop

@section('content')
{{ Form::open(array('url' => 'create_hotel', 'class' => 'form-horizontal')) }}

    <!-- Name -->
    <div class="control-group {{{ $errors->has('name') ? 'error' : '' }}}">
        {{ Form::label('name', 'Hotel name', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('name', Input::get('Name')) }}
            {{ $errors->first('name') }}
        </div>
    </div>

    <!-- Last name -->
    <div class="control-group {{{ $errors->has('address') ? 'error' : '' }}}">
        {{ Form::label('address', 'Address', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('address', Input::get('address')) }}
            {{ $errors->first('address') }}
        </div>
    </div>

    <!-- username -->
    <div class="control-group {{{ $errors->has('tel') ? 'error' : '' }}}">
        {{ Form::label('tel', 'Tel.', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('tel', Input::get('tel')) }}
            {{ $errors->first('tel') }}
        </div>
    </div>
    <!-- Submit button -->
    <div class="control-group">
        <div class="controls">
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </div>
    </div>
@stop