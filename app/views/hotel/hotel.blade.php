@extends('layouts.master')

@section('title')
@parent
::Hotel
@stop

@section('content')
<h1>This is my hotel!</h1>


<!-- Staff can't create hotel -->
@if(!Authority::getCurrentUser()->hasRole('staff'))
    {{ HTML::link('create_hotel', 'Create hotel') }}<br><br>
    @endif


<?php $users=User::find(Auth::id());?>
<!--only Manager can Edit his hotels-->
@if(Authority::getCurrentUser()->hasRole('manager'))

    @foreach($users->hotels as $hotel)
        {{'hotel name : '}}
        {{ HTML::link('hotel/'.$hotel->id,$hotel->name ) }}<br>
    	{{'address : '.$hotel->address}}<br>
    	{{'telephone number : '.$hotel->tel}}<br>
        {{ HTML::link('edit_hotel/'.$hotel->id,'edit '.$hotel->name ) }} <br> <br> 
   
    @endforeach
<!-- Staff can see detail hotel -->
@elseif(Authority::getCurrentUser()->hasRole('staff'))
    @foreach($users->hotels as $hotel)
   
        <!-- check permission staff can view room-->
        @if($users->permissions->view_room==1)
            <!--show url to room-->
            {{ HTML::link('hotel/'.$hotel->id, $hotel->name ) }}
        @else 
            <!--show text-->
            {{'hotel name : '.$hotel->name }}<br>
        @endif
            {{'address : '.$hotel->address}}<br>
            {{'telephone number : '.$hotel->tel}}<br><br>
    
    @endforeach
<!-- Member can sent request for apply to staff of hotel -->
@else
@foreach($hotels as $hotel)
    
        {{'hotel name : '.$hotel->name}}<br>
        {{'address : '.$hotel->address}}<br>
        {{'telephone number : '.$hotel->tel}}<br>
        {{HTML::link('join_hotel/'.$hotel->id, ' Join '.$hotel->name) }}<br><br>

    @endforeach
@endif

@stop