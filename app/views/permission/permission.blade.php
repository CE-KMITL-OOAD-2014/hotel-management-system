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
        {{ $staff_id->name ." ".$staff_id->lastname." "}}<br>

        <b>Set Permission</b><br>
        {{ Form::open(array('url' => 'permission/'.$hotel_id.'/'.$staff_id, 'class' => 'form-horizontal')) }}
 <div  class="checkbox-inline text-left">
    <label class ="checkbox-inline text-right">
      <input type="checkbox"> View room
    </label>
    <br>
       <label class ="checkbox-inline text-right">
      <input type="checkbox"> Edit room
    </label>
    <br>
       <label class ="checkbox-inline text-right">
      <input type="checkbox"> View guest
    </label>
    <br>
       <label class ="checkbox-inline text-right">
      <input type="checkbox"> Edit guest
    </label>
  </div>
  <br> 
    <div class="control-group">
        <div class="controls">
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </div>
    </div>
@endif
    <!-- Login & Register button -->
    <div class="control-group">
        <div class="controls">

        </div>
    </div>
    {{ Form::close() }}
@stop