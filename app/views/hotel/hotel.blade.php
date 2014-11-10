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
    {{ HTML::link('create_hotel', 'Create hotel',array('class' => 'btn btn-info')) }}<br><br>
    @endif

<!--only Manager can Edit his hotels-->
@if( $users->role == 'manager' )
<?php $hotelNumber = 1;?>
<table class="table table-striped table-hover ">
    <thead>
        <tr class="active">
            <th>#</th>
            <th>Name</th>
            <th>Address</th>
            <th>Telephone No.</th>
            <th></th>
        </tr>
    </thead>
    @foreach($users->hotels as $hotel)
    <tbody>
        <tr>
            <td>{{ $hotelNumber }}</td>
            <td>{{ HTML::link('hotel/'.$hotel->id,$hotel->name ) }}</td>
            <td>{{ $hotel->address }}</td>
            <td>{{ $hotel->tel }}</td>
            <td>{{ HTML::link('edit_hotel/'.$hotel->id, 'Edit',array('class' => 'btn btn-default btn-sm')) }}</td>
        </tr>
        <?php $hotelNumber++;?>
    @endforeach
    </tbody>
</table>
<!-- Staff can see detail hotel -->
@elseif( $users->role == 'staff' )
<table class="table table-striped table-hover ">
    <thead>
        <tr class="active">
            <th>Name</th>
            <th>Address</th>
            <th>Telephone No.</th>
            <th></th>
        </tr>
    </thead>
    @foreach($users->hotels as $hotel)

        <tbody>
        <tr>
            <!--show url to room-->
                    <!-- check permission staff can view room-->
        @if($users->permissions->view_room==1&&$users->permissions->manage_room==1)
            <td>{{ HTML::link('hotel/'.$hotel->id,$hotel->name) }}</td>
        @else 
                    <!--show text-->
            <td>{{ $hotel->name }}</td>
        @endif
            <td>{{ $hotel->address }}</td>
            <td>{{ $hotel->tel }}</td>
        </tr>
    @endforeach
<!-- Member can sent request for apply to staff of hotel -->
@else
<?php $hotelNumber = 1;?>
<table class="table table-striped table-hover ">
    <thead>
        <tr class="active">
            <th>#</th>
            <th>Name</th>
            <th>Address</th>
            <th>Telephone No.</th>
            <th></th>
        </tr>
    </thead>
@foreach($hotels as $hotel)
    
        <tbody>
        <tr>
            <td>{{ $hotelNumber }}</td>
            <td>{{ $hotel->name }}</td>
            <td>{{ $hotel->address }}</td>
            <td>{{ $hotel->tel }}</td>
            <td>{{HTML::link('join_hotel/'.$hotel->id, ' Join ',array('class' => 'btn btn-default btn-sm')) }}</td>
        </tr>
   <?php $hotelNumber++;?>       
    @endforeach
      </tbody>
</table>
@endif

@stop