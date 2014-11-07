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
<!--only manager can edit permission staff -->
@if(Authority::getCurrentUser()->hasRole('manager'))
    	<h3>{{ $hotel_id->name  }}</h3>
        <h4>Staff Detail</h4>
        {{"Name : ".$staff_id->name}}<br>
        {{"Lastname : ".$staff_id->lastname}}<br>
        {{"email : ".$staff_id->email}}<br>
        {{"work history : ".$staff_id->work_history}}<br>
        {{ HTML::link('fireStaff/'.$hotel_id->id.'/'.$staff_id->id,'Fire' ) }}<br>
        <h4>Set Permission</h4>
{{ Form::open(array('url' => 'edit_permission/'.$hotel_id->id.'/'.$staff_id->id)) }}
 <div class="radio">
<h5>Room Permission</h5>
  
<li>
@if($staff_id->permissions->view_room == false && $staff_id->permissions->manage_room == false) 
{{ Form::radio('room','no_room',true,array('id'=>'radio1'))}}
@else
{{ Form::radio('room','no_room','',array('id'=>'radio1'))}}
@endif
{{ Form::label('radio1','No Room',array('class'=>'')) }}
</li>

<li>
@if($staff_id->permissions->view_room == true && $staff_id->permissions->manage_room == false) 
{{ Form::radio('room','view_room',true,array('id'=>'radio2'))}}
@else
{{ Form::radio('room','view_room','',array('id'=>'radio2'))}}
@endif
{{ Form::label('radio2','View Room',array('class'=>'')) }}
</li>

<li>
@if($staff_id->permissions->view_room == true && $staff_id->permissions->manage_room == true) 
{{ Form::radio('room','manage_room',true,array('id'=>'radio3')) }}
@else
{{ Form::radio('room','manage_room','',array('id'=>'radio3')) }}
@endif
{{ Form::label('radio3','Manage Room',array('class'=>'')) }}
</li>

<h5>GuestPermission</h5>

<li>
@if($staff_id->permissions->view_guest == false && $staff_id->permissions->manage_guest == false)
{{ Form::radio('guest','no_guest',true,array('id'=>'radio4'))}}
@else
{{ Form::radio('guest','no_guest','',array('id'=>'radio4'))}}
@endif
{{ Form::label('radio4','No Guest',array('class'=>'')) }}
</li>

<li>
@if($staff_id->permissions->view_guest == true && $staff_id->permissions->manage_guest == false)
{{ Form::radio('guest','view_guest',true,array('id'=>'radio5'))}}
@else
{{ Form::radio('guest','view_guest','',array('id'=>'radio5'))}}
@endif
{{ Form::label('radio5','View Guest',array('class'=>'')) }}
</li>

<li>
@if($staff_id->permissions->view_guest == true && $staff_id->permissions->manage_guest == true)
{{ Form::radio('guest','manage_guest',true,array('id'=>'radio6')) }}
@else
{{ Form::radio('guest','manage_guest','',array('id'=>'radio6')) }}
@endif
{{ Form::label('radio6','Manage Guest',array('class'=>'')) }}
</li>
  </div>
 
    <div class="control-group">
        <div class="controls">
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </div>
    </div>
@endif

    {{ Form::close() }}
@stop