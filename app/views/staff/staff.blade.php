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
$test->permissions->view_room = 1;
$test->permissions->change_status_room = 1;
$test->permissions->save();
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
        {{ $user_id->name ." ".$user_id->lastname." ".$user_id->permissions->view_room." ".$user_id->permissions->change_status_room." ".$user_id->permissions->view_guest." ".$user_id->permissions->create_guest}}
        {{ HTML::link('edit_permission/'.$hotel->id.'/'.$user_id->id, 'Edit permissions') }}
        <br>
 
        @endif
    	@endforeach
    @endforeach

@endif

@stop