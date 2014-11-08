@extends('layouts.master')

@section('title')
@parent
:: Create Guest
@stop

@section('content')


{{ Form::open(array('url' => 'create_guest/'.$hotel_id, 'class' => 'form-horizontal')) }}
<?php $hotel=Hotel::find($hotel_id)?>
<h3>{{ $hotel->name }}</h3>
 <b>Create Guest</b>


    <!-- Gender -->
    <div class="control-group {{{ $errors->has('gender') ? 'error' : '' }}}">
        {{ Form::label('gender', 'Gender', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::select('gender', array('Male'=>'Male','Female'=>'Female')) }}
            {{ $errors->first('gender') }}
        </div>
    </div>

    <!-- Nationality -->
    <div class="control-group {{{ $errors->has('nationality') ? 'error' : '' }}}">
        {{ Form::label('nationality', 'nationality', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('nationality', Input::get('nationality')) }}
            {{ $errors->first('nationality') }}
        </div>
    </div>

    <!-- Name -->
    <div class="control-group {{{ $errors->has('name') ? 'error' : '' }}}">
        {{ Form::label('name', 'Name', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('name', Input::get('Name')) }}
            {{ $errors->first('name') }}
        </div>
    </div>

    <!-- Lastname -->
    <div class="control-group {{{ $errors->has('lastname') ? 'error' : '' }}}">
        {{ Form::label('lastname', 'Lastname', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('lastname', Input::get('lastname')) }}
            {{ $errors->first('lastname') }}
        </div>
    </div>

    <!-- DateOfBirth -->
    <div class="control-group {{{ $errors->has('dateOfBirth') ? 'error' : '' }}}">
        {{ Form::label('dateOfBirth', 'Date Of Birth', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('dateOfBirth', Input::get('dateOfBirth')) }}
            {{ $errors->first('dateOfBirth') }}
        </div>
    </div>

    <!-- address -->
    <div class="control-group {{{ $errors->has('address') ? 'error' : '' }}}">
        {{ Form::label('address', 'Address', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::textarea('address', Input::get('address')) }}
            {{ $errors->first('address') }}
        </div>
    </div>

    <!-- telephon number -->
    <div class="control-group {{{ $errors->has('tel') ? 'error' : '' }}}">
        {{ Form::label('tel', 'Tel.', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('tel', Input::get('tel')) }}
            {{ $errors->first('tel') }}
        </div>
    </div>

     <!-- passport number -->
    <div class="control-group {{{ $errors->has('passportNo') ? 'error' : '' }}}">
        {{ Form::label('passportNo', 'Passport Number.', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('passportNo', Input::get('passportNo')) }}
            {{ $errors->first('passportNo') }}
        </div>
    </div>

         <!-- citizen card number -->
    <div class="control-group {{{ $errors->has('citizenCardNo') ? 'error' : '' }}}">
        {{ Form::label('citizenCardNo', 'Citizen Card Number.', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('citizenCardNo', Input::get('citizenCardNo')) }}
            {{ $errors->first('citizenCardNo') }}
        </div>
    </div>

    <!-- Submit button -->
    <div class="control-group">
        <div class="controls">
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </div>
    </div>
@stop