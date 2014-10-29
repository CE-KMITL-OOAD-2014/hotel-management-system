@extends('layouts.master')

@section('title')
@parent
:: My Staff
@stop

@section('content')
<h1>This is  my staff</h1>
<p>This page is created using a master template.</p>

<?php $user=User::find(Auth::id());?>
<?php $users=User::all();?>
@if(Authority::getCurrentUser()->hasRole('manager'))
    @foreach($user->hotels as $hotel)
    	<li>{{ $hotel->name  }}</li>
    	@foreach($hotel->users as $user_id)
    	<li>{{ $user_id->name }}</li>
    	@endforeach
    @endforeach
@elseif(Authority::getCurrentUser()->hasRole('staff'))
 	@foreach($user->hotels as $hotel)
    	<li>{{ $hotel->name  }}</li>
    	@foreach($hotel->users as $user_id)
    	<li>{{ $user_id->name }}</li>
    	@endforeach
    @endforeach
@endif
    <!-- Login & Register button -->
    <div class="control-group">
        <div class="controls">

        </div>
    </div>
@stop