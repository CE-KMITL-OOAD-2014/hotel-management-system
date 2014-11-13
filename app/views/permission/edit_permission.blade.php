@extends('layouts.master')

@section('title')
@parent
::Edit Permission
@stop

@section('content')
<h3>Edit  Permission</h3>

<?php 
$user=User::find(Auth::id());
?>
<div class="well col-lg-6 center-block" style="float: none;">

    <legend>Staff Detail</legend>
    <p><strong>Name : </strong>{{$staff->name .' '.$staff->lastname}}</p> 
    <p><strong>Email : </strong>{{$staff->email}}</p> 

    {{ Form::open(array('url' => 'edit_permission/'.$hotel->id.'/'.$staff->id, 'class' => 'form-horizontal')) }}
    <fieldset>
        <legend>Set Permission</legend>
        <div class="form-group">
          <label class="col-lg-2 control-label">Room</label>
          <div class="col-lg-10">

            <div class="radio">
                <label>
                   @if($staff->permissions->view_room == false && $staff->permissions->manage_room == false)
                   {{ Form::radio('room','no_room',true,array('id'=>'radio1'))}}
                   @else
                   {{ Form::radio('room','no_room','',array('id'=>'radio1'))}}
                   @endif
                   Not allowed
               </label>
           </div>

           <div class="radio">
            <label>
                @if($staff->permissions->view_room == true && $staff->permissions->manage_room == false) 
                {{ Form::radio('room','view_room',true,array('id'=>'radio2'))}}
                @else
                {{ Form::radio('room','view_room','',array('id'=>'radio2'))}}
                @endif
                View Room
            </label>
        </div>

        <div class="radio">
            <label>
                @if($staff->permissions->view_room == true && $staff->permissions->manage_room == true) 
                {{ Form::radio('room','manage_room',true,array('id'=>'radio3')) }}
                @else
                {{ Form::radio('room','manage_room','',array('id'=>'radio3')) }}
                @endif
                Manage Room
            </label>
        </div>
    </div>
</div>
<div class="form-group">
    <label class="col-lg-2 control-label">Guest</label>
    <div class="col-lg-10">

        <div class="radio">
            <label>
                @if($staff->permissions->view_guest == false && $staff->permissions->manage_guest == false)
                {{ Form::radio('guest','no_guest',true,array('id'=>'radio4'))}}
                @else
                {{ Form::radio('guest','no_guest','',array('id'=>'radio4'))}}
                @endif
                Not Allowed
            </label>
        </div>

        <div class="radio">
            <label>
                @if($staff->permissions->view_guest == true && $staff->permissions->manage_guest == false)
                {{ Form::radio('guest','view_guest',true,array('id'=>'radio5'))}}
                @else
                {{ Form::radio('guest','view_guest','',array('id'=>'radio5'))}}
                @endif
                View Guest
            </label>
        </div>

        <div class="radio">
            <label>
                @if($staff->permissions->view_guest == true && $staff->permissions->manage_guest == true)
                {{ Form::radio('guest','manage_guest',true,array('id'=>'radio6')) }}
                @else
                {{ Form::radio('guest','manage_guest','',array('id'=>'radio6')) }}
                @endif
                Manage Guest
            </label>
        </div>
    </div>
</div>
<div class="form-group">
    <!-- Work history -->
    <div class="control-group {{{ $errors->has('work_history') ? 'error' : '' }}}">
        {{ Form::label('work_history', 'Work History', array('class' => 'col-lg-2 control-label')) }}
        <div class="col-lg-10">
            {{ Form::textarea('work_history', $staff->work_history,array('class'=>'form-control','rows'=>'3','id'=>'inputaddress'))}}
            {{ $errors->first('work_history') }}
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-lg-10 col-lg-offset-2">
        {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
        {{ HTML::link('staff','Cancel',array('class' => 'btn btn-default')) }}
        <!--fire this staff -->
        {{ HTML::link('fireStaff/'.$hotel->id.'/'.$staff->id,'Fire',array('class' => 'btn btn-danger pull-right','onclick'=>"return confirm('Are you sure you want to fire this staff?')")) }}
    </div>
</div>
</fieldset>
{{ Form::close() }}
</div>
@stop