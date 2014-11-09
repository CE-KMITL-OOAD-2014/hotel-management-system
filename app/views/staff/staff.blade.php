@extends('layouts.master')

@section('title')
@parent
:: My Staff
@stop

@section('content')
<h1>This is  my staff</h1>

<?php $user=User::find(Auth::id());?>
<!-- only manager  see edit permission staff -->
@if($user->role == 'manager')
    <!--show all his hotels -->
    @foreach($user->hotels as $hotel)
    	<h3>{{ $hotel->name  }}</h3>
    	@foreach($hotel->users as $user_id)
            <!--show  manger  -->
            @if($user_id->role == 'manager')
    	       {{"Manager name : ". $user_id->name." ".$user_id->lastname }}<br>
                <b>Staff</b><br>
            <!--show  staff  -->
            @elseif($user_id->role == 'staff')
                {{ $user_id->name ." ".$user_id->lastname." "}}
                {{ HTML::link('edit_permission/'.$hotel->id.'/'.$user_id->id, 'Edit permissions') }}
                <br>
            @endif      
        @endforeach
    @endforeach
 <!-- staff can see his friend staffs in his hotel -->
@elseif($user->role == 'staff')
         <!--show  his hotel -->
        @foreach($user->hotels as $hotel)
            <h3>{{ $hotel->name  }}</h3>
            @foreach($hotel->users as $user_id)
                <!--show  manger-->
                @if($user_id->role == 'manager')
                {{"Manager name : ". $user_id->name." ".$user_id->lastname }}<br>
                <!--show  staff -->
                <b>Staff</b><br>
                @elseif($user_id->role == 'staff')
                    {{ $user_id->name ." ".$user_id->lastname." "}}
                <br>
                @endif      
            @endforeach
        @endforeach
@endif

@stop