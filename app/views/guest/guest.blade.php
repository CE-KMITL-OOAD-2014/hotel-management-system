@extends('layouts.master')

@section('title')
@parent
:: My guest
@stop

@section('content')
<h1>Guest</h1>

<?php $users=User::find(Auth::id());?>
<!--manager can see all guest in his hotels-->
@if($users->role == 'manager')
<!--show all hotel manager -->
@foreach($users->hotels as $hotel)
<h3>Hotel : {{ $hotel->name  }}</h3>
{{ HTML::link('create_guest/'.$hotel->id, 'Create guest',array('class' => 'btn btn-info')) }}
<!--show all guest each hotel-->
<?php $guestNumber = 1;?>
<table class="table table-striped table-hover ">
	<thead>
		<tr class="active">
			<th>#</th>
			<th>Name</th>
			<th>Telephone No.</th>
			<th></th>
		</tr>
	</thead>
	@foreach($hotel->guests as $guest)
	<tbody>
		<tr>
			<td>{{ $guestNumber}}</td>
			<td>{{ $guest->name.' '.$guest->lastname}}</td>
			<td>{{ $guest->tel}}</td>
			<td>{{ HTML::link('edit_guest/'.$hotel->id.'/'.$guest->id, 'Edit',array('class' => 'btn btn-default btn-sm')) }}</td>
		</tr>
		<?php $guestNumber++;?>
		@endforeach 
	</tbody>
</table>
@endforeach


<!--staff can see all guest in his hotel-->
@elseif($users->permissions->view_guest==1)
<!--show  hotel staff -->
@foreach($users->hotels as $hotel)
<h3>{{ $hotel->name  }}</h3>
<!--check  permission staff can create guest-->
@if($users->permissions->manage_guest==1 )
{{ HTML::link('create_guest/'.$hotel->id, 'Create guest',array('class' => 'btn btn-info')) }}
@endif
<!--show all guest each hotel-->
<?php $guestNumber = 1;?>
<table class="table table-striped table-hover ">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
			<th>Telephone No.</th>
			@if($users->permissions->manage_guest==1 )
			<th></th>
			@endif
		</tr>
	</thead>
	@foreach($hotel->guests as $guest)
	<tbody>
		<tr class="active">
			<td>{{ $guestNumber}}</td>
			<td>{{ $guest->name.' '.$guest->lastname}}</td>
			<td>{{ $guest->tel}}</td>
			@if($users->permissions->manage_guest==1 )
			<td>{{ HTML::link('edit_guest/'.$hotel->id.'/'.$guest->id, 'Edit',array('class' => 'btn btn-default btn-sm')) }}</td>
			@endif
		</tr>
		<?php $guestNumber++;?>
		@endforeach 
	</tbody>
</table>
@endforeach
@endif

@stop

