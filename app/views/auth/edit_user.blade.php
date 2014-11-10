@extends('layouts.master')

@section('title')
@parent
::Edit_profile
@stop

{{-- Content --}}
@section('content')
<?php 
$user=User::find(Auth::id());
?>
<div class="well col-lg-7 center-block" style="float: none;">
    {{ Form::open(array('url' => 'edit_user', 'class' => 'form-horizontal')) }}
    <fieldset>
        <legend>Edit profile</legend>
        <!-- Name -->
        <div class="form-group">
            {{ Form::label('inputname', 'Name', array('class' => 'col-lg-2 control-label')) }}
            <div class="col-lg-10">
                {{ Form::text('name',$user->name,array('class'=>'form-control','id'=>'inputname','placeholder'=>'First Name',
                'autocomplete'=>'off','style' => 'cursor: pointer; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;'))}}
                {{ $errors->first('name') }}
            </div>
        </div>

        <!-- Last name -->
        <div class="form-group">
            {{ Form::label('inputlastname', 'Last name', array('class' => 'col-lg-2 control-label')) }}
            <div class="col-lg-10">
                {{ Form::text('lastname', $user->lastname,array('class'=>'form-control','id'=>'inputlastname','placeholder'=>'Last Name',
                'autocomplete'=>'off','style' => 'cursor: pointer; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;'))}}
                {{ $errors->first('lastname') }}
            </div>
        </div>

        
        <!-- Email -->
        <div class="form-group">
            {{ Form::label('inputemail', 'Email', array('class' => 'col-lg-2 control-label')) }}
            <div class="col-lg-10">
                {{ Form::email('email', $user->email,array('class'=>'form-control','id'=>'inputemail','placeholder'=>'Email',
                'autocomplete'=>'off','style' => 'cursor: pointer; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;'))}}
                {{ $errors->first('email') }}
            </div>
        </div>


        <!-- Submit button -->
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
                {{ HTML::link('','cancel',array('class' => 'btn btn-default')) }}
            </div>
        </div>
    </div>
</fieldset>
{{ Form::close() }}
@stop