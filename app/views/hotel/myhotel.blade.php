@extends('layouts.master')

@section('title')
@parent
:: My hotel
@stop

@section('content')
<h1>This is my hotel!</h1>
<p>This page is created using a master template.</p>

    <!-- Login & Register button -->
    <div class="control-group">
        <div class="controls">

            {{ HTML::link('create_hotel', 'Create hotel') }}
            {{ HTML::link('join_hotel', 'Join') }}
        </div>
    </div>
<?php $users=User::find(Auth::id());?>

    @foreach($users->hotels as $hotel)
    	<li>{{ HTML::link('myhotel/'.$hotel->id, $hotel->name ) }}
    	{{ $hotel->address}}
    	{{ $hotel->tel}}
 
       
         {{ HTML::link('join_hotel', 'Join') }}
       

</li>
    @endforeach
@stop