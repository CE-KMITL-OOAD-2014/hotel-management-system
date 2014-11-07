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

{{ Form::open(array('url' => 'edit_hotel/'.$hotel->id , 'class' => 'form-horizontal')) }}
    @if(Authority::getCurrentUser()->hasRole('manager'))
    {{ HTML::link('delete_hotel/'.$hotel->id,'Delete' ) }}
    @endif
    <!-- Name -->
    <div class="control-group {{{ $errors->has('name') ? 'error' : '' }}}">
        {{ Form::label('name', 'Hotel name', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('name',$hotel->name) }}
            {{ $errors->first('name') }}
        </div>
    </div>

    <!-- Last name -->
    <div class="control-group {{{ $errors->has('address') ? 'error' : '' }}}">
        {{ Form::label('address', 'Address', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('address', $hotel->address) }}
            {{ $errors->first('address') }}
        </div>
    </div>

    
        <!-- tel -->
    <div class="control-group {{{ $errors->has('tel') ? 'error' : '' }}}">
        {{ Form::label('tel', 'Tel', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('tel', $hotel->tel) }}
            {{ $errors->first('tel') }}
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