@extends('layouts.master')

@section('title')
@parent
::Edit_profile
@stop

{{-- Content --}}
@section('content')

    <h2>Edit hotel </h2>


{{ Form::open(array('url' => 'edit_hotel/'.$hotel->id , 'class' => 'form-horizontal')) }}
    


    <!-- hotel name -->
    <div class="control-group {{{ $errors->has('name') ? 'error' : '' }}}">
        {{ Form::label('name', 'Hotel name', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('name',$hotel->name) }}
            {{ $errors->first('name') }}
            <!-- only manager can delete his hotel-->
            @if(Authority::getCurrentUser()->hasRole('manager'))
            {{ HTML::link('delete_hotel/'.$hotel->id,'Delete '.$hotel->name ) }}
            @endif
        </div>
    </div>

    <!-- address -->
    <div class="control-group {{{ $errors->has('address') ? 'error' : '' }}}">
        {{ Form::label('address', 'Address', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::textarea('address', $hotel->address) }}
            {{ $errors->first('address') }}
        </div>
    </div>

    
        <!-- telephonumber -->
    <div class="control-group {{{ $errors->has('tel') ? 'error' : '' }}}">
        {{ Form::label('tel', 'Tel', array('class' => 'control-label')) }}
        <div class="controls">
            {{ Form::text('tel', $hotel->tel) }}
            {{ $errors->first('tel') }}
        </div>
    </div>
    <br>
    <!-- Submit button -->
    <div class="control-group">
        <div class="controls">
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </div>
    </div>

{{ Form::close() }}
@stop