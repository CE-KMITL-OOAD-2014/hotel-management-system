@extends('layouts.master')

@section('title')
@parent
:: Permission
@stop

@section('content')
<h1>This is edit  Permission</h1>

<?php 
$user=User::find(Auth::id());
?>

@if(Authority::getCurrentUser()->hasRole('manager'))
    	<h3>{{ $hotel_id->name  }}</h3>
        <b>Staff Detail</b><br>
        {{ $staff_id->name ." ".$staff_id->lastname." ".$staff_id->id}}<br>
        <b>Set Permission</b><br>
{{ Form::open(array('url' => 'edit_permission/'.$hotel_id->id.'/'.$staff_id->id)) }}
 <div class="radio">

<h3>Room Permission</h3>

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

<h3>GuestPermission</h3>

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