@extends('layouts.master')

@section('title')
@parent
:: Permission
@stop

@section('content')
<h1>This is  Permission</h1>


<?php 
$user=User::find(Auth::id());
      ?>

@if(Authority::getCurrentUser()->hasRole('manager'))
    	<h3>{{ $hotel_id->name  }}</h3>

        <b>Staff Detail</b><br>
        {{ $staff_id->name ." ".$staff_id->lastname." ".$staff_id->id}}<br>

        <b>Set Permission</b><br>
{{ Form::open(array('url' => 'permission/'.$hotel_id->id.'/'.$staff_id->id)) }}
 <div class="checkbox">
<li>
{{ Form::hidden('view_room', false) }}
{{ Form::checkbox('view_room',true,'',array('id'=>'checkbox1'))}}
{{ Form::label('checkbox1','View Room',array('class'=>'')) }}
</li>

<li>
{{ Form::hidden('change_status_room', false) }}
{{ Form::checkbox('change_status_room',true,'',array('id'=>'checkbox2')) }}
{{ Form::label('checkbox2','Change room status',array('class'=>'')) }}
</li>

<li>
{{ Form::hidden('view_guest', false) }}
{{ Form::checkbox('view_guest',true,'',array('id'=>'checkbox3'))}}
{{ Form::label('checkbox3','View guest',array('class'=>''))}}
</li>

<li>
{{ Form::hidden('create_guest', false) }}
{{ Form::checkbox('create_guest',true,'',array('id'=>'checkbox4')) }}
{{ Form::label('checkbox4','Create guest',array('class'=>'')) }}
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