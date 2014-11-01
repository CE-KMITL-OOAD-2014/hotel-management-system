@extends('layouts.master')

@section('title')
@parent
:: Permission
@stop

@section('content')
<h1>This is  Permission</h1>



@if(Authority::getCurrentUser()->hasRole('manager'))
    @foreach($user->hotels as $hotel)
    	<h3>{{ $hotel->name  }}</h3>
    	@foreach($hotel->users as $user_id)
        @if($user_id->hasRole('manager'))
    	{{"Manager name : ". $user_id->name." ".$user_id->lastname }}<br>
        <b>Staff</b><br>
        @elseif($user_id->hasRole('staff'))
        {{ $user_id->name ." ".$user_id->lastname." ".$user_id->permissions->view_room." ".$user_id->permissions->user_id}}<br>
 <div class="checkbox-inline text-right">
    <label class ="checkbox-inline text-right">
      <input type="checkbox"> View room
    </label>
       <label class ="checkbox-inline text-right">
      <input type="checkbox"> Edit room
    </label>
       <label class ="checkbox-inline text-right">
      <input type="checkbox"> View guest
    </label>
       <label class ="checkbox-inline text-right">
      <input type="checkbox"> Edit guest
    </label>
  </div>
  <br> 
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