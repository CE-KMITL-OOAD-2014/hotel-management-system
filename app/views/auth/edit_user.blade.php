@extends('layouts.master')

@section('title')
@parent
::Edit_profile
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
    <h2>Edit profile page</h2>
</div>
<?php 
$user=User::find(Auth::id());
?>
{{ Form::open(array('url' => 'edit_user', 'class' => 'form-horizontal')) }}

    <!-- Name -->
    <div class="control-group {{{ $errors->has('name') ? 'error' : '' }}}">
        {{ Form::label('name', 'Name', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('name',$user->name) }}
            {{ $errors->first('name') }}
        </div>
    </div>

    <!-- Last name -->
    <div class="control-group {{{ $errors->has('lastname') ? 'error' : '' }}}">
        {{ Form::label('lastname', 'Last name', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('lastname', $user->lastname) }}
            {{ $errors->first('lastname') }}
        </div>
    </div>

    
        <!-- Email -->
    <div class="control-group {{{ $errors->has('email') ? 'error' : '' }}}">
        {{ Form::label('email', 'Email', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('email', $user->email) }}
            {{ $errors->first('email') }}
        </div>
    </div>

        <!-- Work history -->
    <div class="control-group {{{ $errors->has('work_history') ? 'error' : '' }}}">
        {{ Form::label('work_history', 'Work History', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::textarea('work_history', $user->work_history) }}
            {{ $errors->first('work_history') }}
        </div>
    </div>

    <!-- Submit button -->
    <div class="control-group">
        <div class="controls">
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </div>
    </div>

{{ Form::close() }}
@stop