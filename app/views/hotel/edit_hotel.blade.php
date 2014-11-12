@extends('layouts.master')

@section('title')
@parent
::Edit_profile
@stop

{{-- Content --}}
@section('content')
<div class="well col-lg-6 center-block" style="float: none;">
    {{ Form::open(array('url' => 'edit_hotel/'.$hotel->id , 'class' => 'form-horizontal')) }}
    <fieldset>
        <legend>Edit Hotel</legend>
        <!-- Name -->
        <div class="form-group {{{ $errors->has('name') ? 'error' : '' }}}">
            {{ Form::label('name', 'Hotel name', array('class' => 'col-lg-2 control-label')) }}
            <div class="col-lg-9">
                {{ Form::text('name', $hotel->name,array('class'=>'form-control','id'=>'inputnationality','placeholder'=>'Hotel Name',
                'autocomplete'=>'off','style' => 'cursor: pointer; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;'))}}
                {{ $errors->first('name') }}
            </div>
        </div>

        <!-- address -->
        <div class="form-group {{{ $errors->has('address') ? 'error' : '' }}}">
            {{ Form::label('address', 'Address', array('class' => 'col-lg-2 control-label')) }}
            <div class="col-lg-9">
                {{ Form::textarea('address', $hotel->address,array('class'=>'form-control','rows'=>'3','id'=>'inputaddress','placeholder' => 'Address'))}}
                {{ $errors->first('address') }}
            </div>
        </div>

        <!-- telephone number -->
        <div class="form-group {{{ $errors->has('tel') ? 'error' : '' }}}">
            {{ Form::label('tel', 'Tel.', array('class' => 'col-lg-2 control-label')) }}
            <div class="col-lg-9">
                {{ Form::text('tel', $hotel->tel,array('class'=>'form-control','id'=>'inputnationality','placeholder'=>'Telephone Number',
                'autocomplete'=>'off','style' => 'cursor: pointer; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;'))}}
                {{ $errors->first('tel') }}
            </div>
        </div>
        
        <!-- Submit button -->
        <div class="form-group">
            <div class="col-lg-9 col-lg-offset-2">
                {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
                {{ HTML::link('hotel','cancel',array('class' => 'btn btn-default')) }}
                {{ HTML::link('delete_hotel/'.$hotel->id,'Delete',array('class' => 'btn btn-danger pull-right')) }}
            </div>
        </div>
    </fieldset>
    {{ Form::close() }}
</div>
@stop