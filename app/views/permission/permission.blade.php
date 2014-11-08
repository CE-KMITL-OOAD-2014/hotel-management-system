@extends('layouts.master')

@section('title')
@parent
:: Permission
@stop

@section('content')
<h3>Set Permission</h3>


<?php 
$user=User::find(Auth::id());
      ?>

    	<h3>{{ $hotel_id->name  }}</h3>
        <h4>Staff Detail</h4>
        {{"Name : ".$staff_id->name}}<br>
        {{"Lastname : ".$staff_id->lastname}}<br>
        {{"email : ".$staff_id->email}}<br>
        {{"work history : ".$staff_id->work_history}}<br>
        <h4>Set Permission</h4>

{{ Form::open(array('url' => 'permission/'.$hotel_id->id.'/'.$staff_id->id)) }}
 <div class="radio">

<h5>Room pemission </h5>
<li>
{{ Form::radio('room','no_room',true,array('id'=>'radio1'))}}
{{ Form::label('radio1','No Room',array('class'=>'')) }}
</li>

<li>
{{ Form::radio('room','view_room','',array('id'=>'radio2'))}}
{{ Form::label('radio2','View Room',array('class'=>'')) }}
</li>


<li>
{{ Form::radio('room','manage_room','',array('id'=>'radio3')) }}
{{ Form::label('radio3','Manage Room',array('class'=>'')) }}
</li>
<h5>Guest permission</h5>
<li>
{{ Form::radio('guest','no_guest',true,array('id'=>'radio4'))}}
{{ Form::label('radio4','No guest',array('class'=>''))}}
</li>

<li>
{{ Form::radio('guest','view_guest','',array('id'=>'radio5'))}}
{{ Form::label('radio5','View guest',array('class'=>''))}}
</li>

<li>
{{ Form::radio('guest','manage_guest','',array('id'=>'radio6')) }}
{{ Form::label('radio6','Create guest',array('class'=>'')) }}
</li>
  </div>
 
    <div class="control-group">
        <div class="controls">
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </div>
    </div>

    {{ Form::close() }}
@stop