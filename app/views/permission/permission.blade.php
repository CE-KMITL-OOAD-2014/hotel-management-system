@extends('layouts.master')

@section('title')
@parent
:: Permission
@stop

@section('content')



<?php 
$user=User::find(Auth::id());
?>
<div class="well col-lg-6 center-block" style="float: none;">
	<h3>Accept staff</h3>
	<h3>For : {{ $hotel->name }}</h3>
	<h4><strong>Detail</strong></h4>
	<p><strong>Name : </strong>{{$staff->name .' '.$staff->lastname}}</p> 
	<p><strong>Email : </strong>{{$staff->email}}</p> 
	<p><strong>Work history :</strong>{{$staff->work_history}}</p>

	{{ Form::open(array('url' => 'permission/'.$hotel->id.'/'.$staff->id, 'class' => 'form-horizontal')) }}
	<fieldset>
		<legend>Set Permission</legend>
		<div class="form-group">
			<label class="col-lg-2 control-label">Room</label>
			<div class="col-lg-10">
				<div class="radio">
					<label>
						{{ Form::radio('room','no_room',true,array('id'=>'radio1'))}}
						Not Allowed
					</label>
				</div>
				<div class="radio">
					<label>
						{{ Form::radio('room','view_room','',array('id'=>'radio2'))}}
						View Room
					</label>
				</div>

				<div class="radio">
					<label>
						{{ Form::radio('room','manage_room','',array('id'=>'radio3')) }}
						Manage Room
					</label>
				</div>
			</div>
		</div>

		<div class="form-group">
			<label class="col-lg-2 control-label">Guest</label>
			<div class="col-lg-10">
				<div class = "radio">
					<label>
						{{ Form::radio('guest','no_guest',true,array('id'=>'radio4'))}}
						Not Allowed
					</label>
				</div>

				<div class = "radio">
					<label>
						{{ Form::radio('guest','view_guest','',array('id'=>'radio5'))}}
						View Guest
					</label>
				</div>

				<div class = "radio">
					<label>
						{{ Form::radio('guest','manage_guest','',array('id'=>'radio6')) }}
						Manage Guest
					</label>
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-lg-10 col-lg-offset-2">
				{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
			</div>
		</div>
	</fieldset>
	{{ Form::close() }}
</div>
@stop