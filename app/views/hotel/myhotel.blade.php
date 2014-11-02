@extends('layouts.master')

@section('title')
@parent
:: My hotel
@stop

@section('content')
<h1>This is my hotel!</h1>

    <!-- Login & Register button -->
    <div class="control-group">
        <div class="controls">

            {{ HTML::link('create_hotel', 'Create hotel') }}
            {{ HTML::link('join_hotel', 'Join') }}
        </div>
    </div>


<?php $users=User::find(Auth::id());?>
@if(Authority::getCurrentUser()->hasRole('manager')||Authority::getCurrentUser()->hasRole('staff'))
    @foreach($users->hotels as $hotel)
    	<li>{{ HTML::link('myhotel/'.$hotel->id, $hotel->name ) }}
    	{{ $hotel->address}}
    	{{ $hotel->tel}}
       

</li>
    @endforeach
@else
@foreach($hotels as $hotel)
        <li>{{$hotel->name }}
        {{ $hotel->address}}
        {{ $hotel->tel}}
         {{ HTML::link('join_hotel/'.$hotel->id, 'Join') }}
</li>
    @endforeach
@endif
@stop