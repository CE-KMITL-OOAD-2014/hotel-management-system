@extends('layouts.master')

@section('title')
@parent
:: My Staff
@stop

@section('content')
<h1>Staff list</h1>

<?php $user=User::find(Auth::id());?>
<!-- only manager can see edit permission button -->
@if($user->role == 'manager')
    <!--show all his hotels -->
    @foreach($user->hotels as $hotel)
    	<h3>{{ $hotel->name  }}</h3>
        <?php $staffNumber = 1;?>
<table class="table table-striped table-hover ">
    <thead>
        <tr class="active">
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th></th>
        </tr>
    </thead>
    	@foreach($hotel->users as $user)
            <!--show  staff  -->
            @if($user->role == 'staff')
            <tbody>
        <tr>
            <td>{{ $staffNumber }}</td>
            <td>{{ $user->name ." ".$user->lastname}}</td>
            <td>{{ $user->email}}</td>
            <td>{{ HTML::link('edit_permission/'.$hotel->id.'/'.$user->id, 'Edit',array('class' => 'btn btn-default btn-sm'))}}</td>
        </tr>
        <?php $staffNumber++;?>
            @endif
        @endforeach
         </tbody>
</table>
    @endforeach
 <!-- staff can see other staffs in hotel -->
@elseif($user->role == 'staff')
         <!--show  his hotel -->
        @foreach($user->hotels as $hotel)
            <h3>{{ $hotel->name  }}</h3>
             <?php $staffNumber = 1;?>
<table class="table table-striped table-hover ">
    <thead>
        <tr class="active">
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th></th>
        </tr>
    </thead>
            @foreach($hotel->users as $user)
                <!--show  manger-->
                @if($user->role == 'manager')
                <p><strong>Manager name : </strong>{{$user->name." ".$user->lastname }}</p>
                <!--show  staff -->
                <b>Staff</b><br>
                @elseif($user->role == 'staff')
                           <tbody>
        <tr>
            <td>{{ $staffNumber }}</td>
            <td>{{ $user->name ." ".$user->lastname}}</td>
            <td>{{ $user->email}}</td>
            <td>{{ HTML::link('edit_permission/'.$hotel->id.'/'.$user->id, 'Edit',array('class' => 'btn btn-default btn-sm'))}}</td>
        </tr>
        <?php $staffNumber++;?>
            @endif
        @endforeach
         </tbody>
</table>
        @endforeach
@endif

@stop