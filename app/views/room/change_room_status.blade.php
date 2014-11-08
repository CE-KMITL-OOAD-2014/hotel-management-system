@extends('layouts.master')
@section('head')
@parent
{{ HTML::style('pickadate.js-3.5.4/themes/classic.css') }}
{{ HTML::style('pickadate.js-3.5.4/themes/classic.date.css') }}
@stop
@section('title')
@parent
:: Change room status
@stop

@section('content')

<?php  echo "My hotel id is :".$hotel_id;?> <br>
{{ Form::open(array('url' => 'change_room_status/'.$hotel_id)) }}
{{ Form::select('roomnumber', $rooms) }}
{{ $errors->first('roomnumber') }}
<br />
{{ Form::select('status', $status) }}
{{ $errors->first('status') }}
<br />
{{Form::text('start_date','',array('id'=>'date','placeholder'=>'Choose start date'))}}
{{ $errors->first('start_date') }}
<br />
{{Form::text('end_date','',array('id'=>'date2','placeholder'=>'Choose end date'))}}
{{ $errors->first('end_date') }}
   <div class="control-group">
        <div class="controls">
            {{ Form::submit('Submit', array('class' => 'btn')) }}
        </div>
    </div>
{{ Form::close() }}
@section('js')
{{ HTML::script('js/jquery-1.11.1.min.js')}}
{{ HTML::script('pickadate.js-3.5.4/picker.js')}}
{{ HTML::script('pickadate.js-3.5.4/picker.date.js')}}
<script>
  $(function() {
    // Enable Pickadate on an input field
    $('#date').pickadate({
        formatSubmit : 'yyyy-mm-dd',
        format : 'yyyy-mm-dd',
    });
       $('#date2').pickadate({
        formatSubmit : 'yyyy-mm-dd',
        format : 'yyyy-mm-dd',
    });
  });   
</script>
@stop