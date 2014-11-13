@extends('layouts.master')

@section('title')
@parent
:: My Staff
@stop

@section('content')
<h1>Request</h1>



<?php $user=User::find(Auth::id());?>

@foreach($user->Hotels as $hotel)
<!-- show all hotels that belong to this manager-->
<h3>Hotel : {{ $hotel->name  }}</h3>
<?php $requestNumber = 1;?>
<table class="table table-striped table-hover ">
    <thead>
        <tr class="active">
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>History</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    @foreach($hotel->requestUsers as $member)
    <!-- show member request for each hotel -->
    <tbody>
        <tr>
            <td>{{ $requestNumber }}</td>
            <td>{{$member->name.' '.$member->lastname}}</td>
            <td>{{ $member->email }}</td>
            <td>{{ $member->workhistory }}</td>
            <td>{{ HTML::link('accept/'.$hotel->id.'/'.$member->id, 'Accept',array('class' => 'btn btn-default btn-sm')) }}</td>
            <td>{{ HTML::link('decline/'.$hotel->id.'/'.$member->id, 'Decline',array('class' => 'btn btn-default btn-sm')) }}</td>
        </tr>
        <?php $requestNumber++;?>
        @endforeach
    </tbody>
</table>
@endforeach

@stop