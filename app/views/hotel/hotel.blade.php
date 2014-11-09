@extends('layouts.master')

@section('title')
@parent
::Hotel
@stop

@section('content')
<h1>This is my hotel!</h1>

<?php $users=User::find(Auth::id());?>
<!-- Staff can't create hotel -->
@if( $users->role != 'staff')
    {{ HTML::link('create_hotel', 'Create hotel') }}<br><br>
    @endif



<!--only Manager can Edit his hotels-->
@if( $users->role == 'manager' )

    @foreach($users->hotels as $hotel)
        {{'hotel name : '}}
        {{ HTML::link('hotel/'.$hotel->id,$hotel->name ) }}<br>
    	{{'address : '.$hotel->address}}<br>
    	{{'telephone number : '.$hotel->tel}}<br>
        {{ HTML::link('edit_hotel/'.$hotel->id,'edit '.$hotel->name ) }} <br> <br> 
   
    @endforeach
<!-- Staff can see detail hotel -->
@elseif( $users->role == 'staff' )
    @foreach($users->hotels as $hotel)
   
        <!-- check permission staff can view room-->
        @if($users->permissions->view_room==1&&$users->permissions->manage_room==1)
            <!--show url to room-->
            {{'hotel name : '}}
            {{ HTML::link('hotel/'.$hotel->id, $hotel->name  ) }}<br>
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