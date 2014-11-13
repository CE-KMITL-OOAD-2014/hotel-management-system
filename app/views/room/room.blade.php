@extends('layouts.master')


@section('title')
@parent
:: My room
@stop

@section('content')
<h1>Room</h1>

<?php 
$user=User::find(auth::id());
?>
<!-- Manager can create and edit rooms -->
@if( $user->role == 'manager' )
@foreach($user->hotels as $hotel)
<h3>{{'Hotel : '.$hotel->name }}</h3>
{{ HTML::link('create_room/'.$hotel->id, 'Create room',array('class'=>'btn btn-info')) }}
<?php $roomNumber = 1;?>
<table class="table table-striped table-hover ">
    <thead>
        <tr class="active">
            <th>#</th>
            <th>Room Number</th>
            <th>Price</th>
            <th>Detail</th>
            <th></th>
        </tr>
    </thead>
    @foreach($hotel->rooms as $room)
    <tbody>
        <tr>
            <td>{{ $roomNumber }}</td>
            <td>{{ $room->roomnumber}}</td>
            <td>{{ $room->price}}</td>
            <td>{{ $room->detail}}</td>
            <td>{{ HTML::link('edit_room/'.$hotel->id.'/'.$room->id, 'Edit',array('class' => 'btn btn-default btn-sm')) }}</td>
        </tr>
        <?php $roomNumber++;?>
        @endforeach 
    </tbody>
</table>
@endforeach

<!-- staff with permission can see rooms in his hotel -->
@elseif( $user->permissions->view_room == 1)
@foreach($user->hotels as $hotel)
<?php $roomNumber = 1;?>
<table class="table table-striped table-hover ">
    <thead>
        <tr class="active">
            <th>#</th>
            <th>Room Number</th>
            <th>Price</th>
            <th>Detail</th>
        </tr>
    </thead>
    @foreach($hotel->rooms as $room)
    <tbody>
        <tr>
            <td>{{ $roomNumber }}</td>
            <td>{{ $room->roomnumber}}</td>
            <td>{{ $room->price}}</td>
            <td>{{ $room->detail}}</td>
        </tr>
        <?php $roomNumber++;?>
        @endforeach
    </tbody>
</table>
@endforeach
@endif
@stop