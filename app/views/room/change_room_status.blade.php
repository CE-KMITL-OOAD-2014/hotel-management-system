@extends('layouts.master')

@section('title')
@parent
:: Change room status
@stop

@section('content')

<?php  echo "My hotel id is :".$hotel_id;?> <br>
{{ Form::select('Room list', $rooms) }}
<br />
{{ Form::select('Status', $status) }}
@stop