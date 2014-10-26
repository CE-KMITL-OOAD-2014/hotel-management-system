@extends('layouts.master')

@section('title')
@parent
:: Create Hotel
@stop

@section('content')
{{ Form::open(array('url' => 'register', 'class' => 'form-horizontal')) }}

    <!-- Name -->
    <div class="control-group {{{ $errors->has('name') ? 'error' : '' }}}">
        {{ Form::label('name', 'Hotel', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('name', Input::get('Name')) }}
            {{ $errors->first('name') }}
        </div>
    </div>

    <!-- Last name -->
    <div class="control-group {{{ $errors->has('lastname') ? 'error' : '' }}}">
        {{ Form::label('lastname', 'Last name', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('lastname', Input::get('lastname')) }}
            {{ $errors->first('lastname') }}
        </div>
    </div>

    <!-- username -->
    <div class="control-group {{{ $errors->has('username') ? 'error' : '' }}}">
        {{ Form::label('username', 'Username', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('username', Input::get('username')) }}
            {{ $errors->first('username') }}
        </div>
    </div>

    <!-- Password -->
    <div class="control-group {{{ $errors->has('password') ? 'error' : '' }}}">
        {{ Form::label('password', 'Password', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::password('password'), Input::get('password') }}
            {{ $errors->first('password') }}
        </div>
    </div>

        <!-- Email -->
    <div class="control-group {{{ $errors->has('email') ? 'error' : '' }}}">
        {{ Form::label('email', 'Email', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::email('email'), Input::get('email') }}
            {{ $errors->first('email') }}
        </div>
    </div>

    <!-- Submit button -->
    <div class="control-group">
        <div class="controls">
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </div>
    </div>
@stop