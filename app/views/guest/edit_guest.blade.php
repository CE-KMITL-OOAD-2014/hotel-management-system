@extends('layouts.master')

@section('title')
@parent
:: Edit Guest
@stop

@section('content')

<?php 
echo $guest->citizenCardNo;
?>

{{ Form::open(array('url' => 'edit_guest/'.$guest->id, 'class' => 'form-horizontal')) }}
    <!-- Gender -->
    <div class="control-group {{{ $errors->has('gender') ? 'error' : '' }}}">
        {{ Form::label('gender', 'Gender', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('gender',$guest->gender )}}
            {{ $errors->first('gender') }}
        </div>
    </div>

    <!-- Nationality -->
    <div class="control-group {{{ $errors->has('nationality') ? 'error' : '' }}}">
        {{ Form::label('nationality', 'nationality', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('nationality', $guest->nationality) }}
            {{ $errors->first('nationality') }}
        </div>
    </div>

    <!-- Name -->
    <div class="control-group {{{ $errors->has('name') ? 'error' : '' }}}">
        {{ Form::label('name', 'Name', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('name',$guest->name) }}
            {{ $errors->first('name') }}
        </div>
    </div>

    <!-- Lastname -->
    <div class="control-group {{{ $errors->has('lastname') ? 'error' : '' }}}">
        {{ Form::label('lastname', 'Lastname', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('lastname',$guest->lastname) }}
            {{ $errors->first('lastname') }}
        </div>
    </div>

    <!-- DateOfBirth -->
    <div class="control-group {{{ $errors->has('dateOfBirth') ? 'error' : '' }}}">
        {{ Form::label('dateOfBirth', 'Date Of Birth', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('dateOfBirth',$guest->dateOfBirth) }}
            {{ $errors->first('dateOfBirth') }}
        </div>
    </div>

    <!-- address -->
    <div class="control-group {{{ $errors->has('address') ? 'error' : '' }}}">
        {{ Form::label('address', 'Address', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('address',$guest->address) }}
            {{ $errors->first('address') }}
        </div>
    </div>

    <!-- telephon number -->
    <div class="control-group {{{ $errors->has('tel') ? 'error' : '' }}}">
        {{ Form::label('tel', 'Tel.', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('tel',$guest->tel) }}
            {{ $errors->first('tel') }}
        </div>
    </div>

     <!-- passport number -->
    <div class="control-group {{{ $errors->has('passportNo') ? 'error' : '' }}}">
        {{ Form::label('passportNo', 'Passport Number.', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('passportNo',$guest->passportNo) }}
            {{ $errors->first('passportNo') }}
        </div>
    </div>

         <!-- citizen card number -->
    <div class="control-group {{{ $errors->has('citizenCardNo') ? 'error' : '' }}}">
        {{ Form::label('citizenCardNo', 'Citizen Card Number.', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('citizenCardNo',$guest->citizenCardNo  )}}
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