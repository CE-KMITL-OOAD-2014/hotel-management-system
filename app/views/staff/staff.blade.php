@extends('layouts.master')

@section('title')
@parent
:: My Staff
@stop

@section('content')
<h1>This is  my staff</h1>
<p>This page is created using a master template.</p>

<?php $user=User::find(Auth::id());?>
<?php
$test = User::find(4);
$test->permissions->view_room = 0;
echo $test->permissions->view_room;
?>

@if(Authority::getCurrentUser()->hasRole('manager'))
    @foreach($user->hotels as $hotel)
    	<h3>{{ $hotel->name  }}</h3>
    	@foreach($hotel->users as $user_id)
        @if($user_id->hasRole('manager'))
    	{{"Manager name : ". $user_id->name." ".$user_id->lastname }}<br>
        <b>Staff</b><br>
        @elseif($user_id->hasRole('staff'))
        {{ $user_id->name ." ".$user_id->lastname." ".$user_id->permissions->view_room." ".$user_id->permissions->change_status_room." ".$user_id->permissions->view_guest." ".$user_id->permissions->create_guest}}<br>
 
        @endif
    	@endforeach
    @endforeach

@endif
    <!-- Login & Register button -->
    <div class="control-group">
        <div class="controls">

        </div>
    </div>
@stop