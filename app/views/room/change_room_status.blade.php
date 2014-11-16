@extends('layouts.master')
@section('head')
@parent
{{ HTML::style('pickadate.js-3.5.4/themes/default.css') }}
{{ HTML::style('pickadate.js-3.5.4/themes/default.date.css') }}
@stop
@section('title')
@parent
:: Create new room Event
@stop
@section('content')
<div class="well col-lg-5 center-block" style="float: none;">
  {{ Form::open(array('url' => 'change_room_status/'.$hotel_id,'class'=>'form-horizontal')) }}
  <fieldset>
    <legend>Create new room event</legend>
    <div class="form-group">
     <label for="roomnumber" class="col-lg-3 control-label">Room</label>
     <div class="col-lg-6">
      {{ Form::select('roomnumber', $rooms,'',array('class'=>'form-control')) }}
      {{ $errors->first('roomnumber') }}
    </div>
  </div>
  <div class="form-group">
   <label for="status" class="col-lg-3 control-label">Status</label>
   <div class="col-lg-6">
    {{ Form::select('status', $status,'',array('class'=>'form-control')) }}
    {{ $errors->first('status') }}
  </div>
</div>

<div class="form-group">
 <label for="date" class="col-lg-3 control-label">Start date</label>
 <div class="col-lg-6">
  {{Form::text('start_date','',array('class'=>'form-control','id'=>'date','placeholder'=>'Choose start date',
  'autocomplete'=>'off','style' => 'cursor: pointer; background-attachmentund-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;'))}}
  {{Form::hidden('start_date_input','',array('id'=>'date','placeholder'=>'Choose start date'))}}
  {{ $errors->first('start_date') }}
</div>
</div>


<div class="form-group">
 <label for="date" class="col-lg-3 control-label">End date</label>
 <div class="col-lg-6">
  {{Form::text('end_date','',array('class'=>'form-control','id'=>'date2','placeholder'=>'Choose end date',
  'autocomplete'=>'off','style' => 'cursor: pointer; background-attachmentund-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;'))}}
  {{Form::hidden('end_date_input','',array('id'=>'date2','placeholder'=>'Choose end date'))}}
  {{ $errors->first('end_date') }}
</div>
</div>

<!-- Submit button -->
<div class="form-group">
  <div class="col-lg-10 col-lg-offset-3">
    {{ Form::submit('Submit', array('class' => 'btn btn-primary','onclick'=>'document.getElementById("submit").className += " disabled"','id'=>'submit')) }}
    {{ HTML::link('room','cancel',array('class' => 'btn btn-default')) }}
  </div>
</div>
</fieldset>
{{ Form::close() }}
</div>
@section('js')
{{ HTML::script('js/jquery-1.11.1.min.js')}}
{{ HTML::script('pickadate.js-3.5.4/picker.js')}}
{{ HTML::script('pickadate.js-3.5.4/picker.date.js')}}
<script>
$(function() {
    // Enable Pickadate on an input field
    $('#date').pickadate({
      formatSubmit : 'yyyy-mm-dd',
      hiddenName: true,
    });
    $('#date2').pickadate({
      formatSubmit : 'yyyy-mm-dd',
      hiddenName: true,
    });
  });   
</script>
@stop