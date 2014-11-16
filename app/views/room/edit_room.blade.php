@extends('layouts.master')

@section('title')
@parent
:: Create Room
@stop

@section('content')
<div class="well col-lg-7 center-block" style="float: none;">
    {{ Form::open(array('url' => 'edit_room/'.$hotel->id.'/'.$room->id, 'class' => 'form-horizontal')) }}

    <h3>{{ $hotel->name  }}</h3>


    <!-- Roomnumber -->
    <div class="form-group {{{ $errors->has('roomnumber') ? 'error' : '' }}}">
        {{ Form::label('roomnumber', 'Roomnumber', array('class' => 'col-lg-2 control-label')) }}
        <div class="col-lg-10">
            {{ Form::text('roomnumber', $room->roomnumber,array('class'=>'form-control','id'=>'roomnumber','placeholder'=>'Room Number',
            'autocomplete'=>'off','style' => 'cursor: pointer; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;'))}}
            {{ $errors->first('roomnumber') }}
        </div>
    </div>

    <!-- Price -->
    <div class="form-group {{{ $errors->has('price') ? 'error' : '' }}}">
        {{ Form::label('price', 'Price', array('class' => 'col-lg-2 control-label')) }}
        <div class="col-lg-10">
            {{ Form::text('price', $room->price,array('class'=>'form-control','id'=>'price','placeholder'=>'Price',
            'autocomplete'=>'off','style' => 'cursor: pointer; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;'))}}
            {{ $errors->first('price') }}
        </div>
    </div>

    <!-- detail -->
    <div class="form-group {{{ $errors->has('detail') ? 'error' : '' }}}">
        {{ Form::label('detail', 'Detail.', array('class' => 'col-lg-2 control-label')) }}
        <div class="col-lg-10">
            {{ Form::textarea('detail', $room->detail,array('class'=>'form-control','id'=>'detail','placeholder'=>'Detail',
            'autocomplete'=>'off','style' => 'cursor: pointer; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;'))}}
            {{ $errors->first('detail') }}
        </div>
    </div>
    <!-- Submit button -->
    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            {{ Form::submit('Submit', array('class' => 'btn btn-primary','onclick'=>'document.getElementById("submit").className += " disabled"','id'=>'submit')) }}
            {{ HTML::link('room','cancel',array('class' => 'btn btn-default')) }}
            {{ HTML::link('delete_room/'.$hotel->id.'/'.$room->id,'Delete',array('class' => 'btn btn-danger pull-right','onclick'=>"return confirm('Are you sure you want to delete this room?')")) }}
        </div>
    </div>
</div>

@stop