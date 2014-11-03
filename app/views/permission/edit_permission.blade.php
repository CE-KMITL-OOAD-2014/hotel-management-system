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


@if($staff_id->permissions->view_room == false && $staff_id->permissions->manager_room == false)
<li>
{{ Form::radio('room','no_room',true,array('id'=>'radio1'))}}
{{ Form::label('radio1','Nothing',array('class'=>'')) }}
</li>
<li>
{{ Form::radio('room','view_room',array('id'=>'radio2'))}}
{{ Form::label('radio2','View Room',array('class'=>'')) }}
</li>
<li>
{{ Form::radio('room','manager_room',array('id'=>'radio3')) }}
{{ Form::label('radio3','Manage Room',array('class'=>'')) }}
</li>
@elseif($staff_id->permissions->view_room == true && $staff_id->permissions->manager_room == false)
<li>
{{ Form::radio('room','no_room',array('id'=>'radio1'))}}
{{ Form::label('radio1','Nothing',array('class'=>'')) }}
</li>
<li>
{{ Form::radio('room','view_room',true,array('id'=>'radio2'))}}
{{ Form::label('radio2','View Room',array('class'=>'')) }}
</li>
<li>
{{ Form::radio('room','manager_room',array('id'=>'radio3')) }}
{{ Form::label('radio3','Manage Room',array('class'=>'')) }}
</li>
@elseif($staff_id->permissions->view_room == false && $staff_id->permissions->manager_room == true)
<li>
{{ Form::radio('room','no_room',array('id'=>'radio1'))}}
{{ Form::label('radio1','Nothing',array('class'=>'')) }}
</li>
<li>
{{ Form::radio('room','view_room',array('id'=>'radio2'))}}
{{ Form::label('radio2','View Room',array('class'=>'')) }}
</li>
<li>
{{ Form::radio('room','manager_room',true,array('id'=>'radio3')) }}
{{ Form::label('radio3','Manage Room',array('class'=>'')) }}
</li>
@else
@endif





@if($staff_id->permissions->view_guest == false && $staff_id->permissions->manager_guest == false)
<li>
{{ Form::radio('guest','no_guest',true,array('id'=>'radio4'))}}
{{ Form::label('radio4','No guest',array('class'=>''))}}
</li>
<li>
{{ Form::radio('guest','view_guest',array('id'=>'radio5'))}}
{{ Form::label('radio5','View guest',array('class'=>''))}}
</li>
<li>
{{ Form::radio('guest','manage_guest',array('id'=>'radio6')) }}
{{ Form::label('radio6','Create guest',array('class'=>'')) }}
</li>
@elseif($staff_id->permissions->view_guest == true && $staff_id->permissions->manager_guest == false)
<li>
{{ Form::radio('guest','no_guest',array('id'=>'radio4'))}}
{{ Form::label('radio4','No guest',array('class'=>''))}}
</li>
<li>
{{ Form::radio('guest','view_guest',true,array('id'=>'radio5'))}}
{{ Form::label('radio5','View guest',array('class'=>''))}}
</li>
<li>
{{ Form::radio('guest','manage_guest',array('id'=>'radio6')) }}
{{ Form::label('radio6','Create guest',array('class'=>'')) }}
</li>
@elseif($staff_id->permissions->view_guest == false && $staff_id->permissions->manager_guest == true)
<li>
{{ Form::radio('guest','no_guest',array('id'=>'radio4'))}}
{{ Form::label('radio4','No guest',array('class'=>''))}}
</li>
<li>
{{ Form::radio('guest','view_guest',array('id'=>'radio5'))}}
{{ Form::label('radio5','View guest',array('class'=>''))}}
</li>
<li>
{{ Form::radio('guest','manage_guest',true,array('id'=>'radio6')) }}
{{ Form::label('radio6','Create guest',array('class'=>'')) }}
</li>
@else
@endif

<!-- <li>
{{ Form::hidden('view_room', false) }}
@if($staff_id->permissions->view_room == true)
{{ Form::radio('view_room',true,'true',array('id'=>'radio1'))}}
@else
{{ Form::radio('view_room',true,'',array('id'=>'radio1'))}}
@endif
{{ Form::label('radio1','View Room',array('class'=>'')) }}
</li>

<li>
{{ Form::hidden('manage_room', false) }}
@if($staff_id->permissions->manage_room == true)
{{ Form::radio('manage_room',true,'true',array('id'=>'radio2')) }}
@else
{{ Form::radio('manage_room',true,'',array('id'=>'radio2')) }}
@endif
{{ Form::label('radio2','Change room status',array('class'=>'')) }}
</li>

<li>
{{ Form::hidden('view_guest', false) }}
@if($staff_id->permissions->view_guest == true)
{{ Form::radio('view_guest',true,'true',array('id'=>'radio3'))}}
@else
{{ Form::radio('view_guest',true,'',array('id'=>'radio3'))}}
@endif
{{ Form::label('radio3','View guest',array('class'=>''))}}
</li> 

<li>
{{ Form::hidden('manage_guest', false) }}
@if($staff_id->permissions->manage_guest == true)
{{ Form::radio('manage_guest',true,'true',array('id'=>'radio4')) }}
@else
{{ Form::radio('manage_guest',true,'',array('id'=>'radio4')) }}
@endif
{{ Form::label('checkbox4','Create guest',array('class'=>'')) }}
</li> -->
  </div>
 
    <div class="control-group">
        <div class="controls">
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </div>
    </div>
@endif

    {{ Form::close() }}
@stop