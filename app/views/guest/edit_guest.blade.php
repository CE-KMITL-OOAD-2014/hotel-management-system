@extends('layouts.master')

@section('title')
@parent
:: Edit Guest
@stop

@section('content')



{{ Form::open(array('url' => 'edit_guest/'.$hotel_id->id.'/'.$guest_id->id, 'class' => 'form-horizontal')) }}
    <h3>{{ $hotel_id->name  }}</h3>
        <b>Guest Detail</b><br>
    {{ $guest_id->name ." ".$guest_id->lastname." "}}
@if(Authority::getCurrentUser()->hasRole('manager'))
  {{ HTML::link('delete_guest/'.$hotel_id->id.'/'.$guest_id->id,'Delete' ) }}
@endif
    <!-- Gender -->
    <div class="control-group {{{ $errors->has('gender') ? 'error' : '' }}}">
        {{ Form::label('gender', 'Gender', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('gender',$guest_id->gender )}}
            {{ $errors->first('gender') }}
        </div>
    </div>

    <!-- Nationality -->
    <div class="control-group {{{ $errors->has('nationality') ? 'error' : '' }}}">
        {{ Form::label('nationality', 'nationality', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('nationality', $guest_id->nationality) }}
            {{ $errors->first('nationality') }}
        </div>
    </div>

    <!-- Name -->
    <div class="control-group {{{ $errors->has('name') ? 'error' : '' }}}">
        {{ Form::label('name', 'Name', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('name',$guest_id->name) }}
            {{ $errors->first('name') }}
        </div>
    </div>

    <!-- Lastname -->
    <div class="control-group {{{ $errors->has('lastname') ? 'error' : '' }}}">
        {{ Form::label('lastname', 'Lastname', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('lastname',$guest_id->lastname) }}
            {{ $errors->first('lastname') }}
        </div>
    </div>

    <!-- DateOfBirth -->
    <div class="control-group {{{ $errors->has('dateOfBirth') ? 'error' : '' }}}">
        {{ Form::label('dateOfBirth', 'Date Of Birth', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('dateOfBirth',$guest_id->dateOfBirth) }}
            {{ $errors->first('dateOfBirth') }}
        </div>
    </div>

    <!-- address -->
    <div class="control-group {{{ $errors->has('address') ? 'error' : '' }}}">
        {{ Form::label('address', 'Address', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('address',$guest_id->address) }}
            {{ $errors->first('address') }}
        </div>
    </div>

    <!-- telephon number -->
    <div class="control-group {{{ $errors->has('tel') ? 'error' : '' }}}">
        {{ Form::label('tel', 'Tel.', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('tel',$guest_id->tel) }}
            {{ $errors->first('tel') }}
        </div>
    </div>

     <!-- passport number -->
    <div class="control-group {{{ $errors->has('passportNo') ? 'error' : '' }}}">
        {{ Form::label('passportNo', 'Passport Number.', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('passportNo',$guest_id->passportNo) }}
            {{ $errors->first('passportNo') }}
        </div>
    </div>

         <!-- citizen card number -->
    <div class="control-group {{{ $errors->has('citizenCardNo') ? 'error' : '' }}}">
        {{ Form::label('citizenCardNo', 'Citizen Card Number.', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('citizenCardNo',$guest_id->citizenCardNo  )}}
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