@extends('layouts.master')

@section('title')
@parent
:: Login
@stop

{{-- Content --}}
@section('content')

<div class="well col-lg-3 center-block" style="float: none;">
    {{ Form::open(array('url' => 'login', 'class' => 'form-horizontal')) }}
    <fieldset>
        <legend>Login</legend>
        <!-- Name -->
        <div class="form-group">
            {{ Form::label('inputusername', 'Username', array('class' => 'control-label')) }}

            {{ Form::text('username', Input::old('username'),array('class'=>'form-control  input-sm','id'=>'inputusername','style'=>'background-image: none; background-position: 0% 0%; background-repeat: repeat;')) }}
            {{ $errors->first('username') }}
            
        </div>

        <!-- Password -->
        <div class="form-group">
            {{ Form::label('inputpassword', 'Password', array('class' => 'control-label')) }}

            {{ Form::password('password',array('class'=>'form-control  input-sm','id'=>'inputpassword','style'=>'background-image: none; background-position: 0% 0%; background-repeat: repeat;'))}}
            {{ $errors->first('password') }}

        </div>

        <!-- Login & Register button -->
        <div class="control-group">
            <div class="controls">
                {{ Form::submit('Login', array('class' => 'btn btn-primary','onclick'=>'document.getElementById("submit").className += " disabled"','id'=>'submit')) }}
                {{ HTML::link('register', 'Register',array('class' => 'btn btn-default')) }}
            </div>
        </div>
    </fieldset>
    {{ Form::close() }}
</div>
@stop