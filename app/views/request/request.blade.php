@extends('layouts.master')

@section('title')
@parent
:: My Staff
@stop

@section('content')
<h1>This is  request</h1>



<?php $user=User::find(Auth::id());?>

    @foreach($user->Hotels as $hotel)
        <!-- show all his hotels -->
    	<h3>{{ $hotel->name  }}</h3>
    	@foreach($hotel->requestUsers as $member)
    	
            <!-- show member require for each hotel -->
            
         
            {{"Name : ".$member->name}}   
           <br>
            {{"Lastname : ".$member->lastname}}<br>
            {{"email : ".$member->email}}<br>
            {{"work history : ".$member->workhistory}}<br>
             {{ HTML::link('accept/'.$hotel->id.'/'.$member->id, 'accept') }}
            {{ HTML::link('decline/'.$hotel->id.'/'.$member->id, 'decline') }}<br><br>

       
    	@endforeach
    @endforeach

@stop