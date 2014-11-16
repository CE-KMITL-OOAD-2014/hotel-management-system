@extends('layouts.master')
@section('head')
@parent
{{ HTML::style('pickadate.js-3.5.4/themes/classic.css') }}
{{ HTML::style('pickadate.js-3.5.4/themes/classic.date.css') }}
@stop
@section('title')
@parent
:: Edit Guest
@stop

@section('content')
<div class="well col-lg-6 center-block" style="float: none;">
    {{ Form::open(array('url' => 'edit_guest/'.$hotel_id->id.'/'.$guest_id->id, 'class' => 'form-horizontal')) }}
    <fieldset>
        <legend>Edit guest profile</legend>


        <!-- Gender -->
        <div class="form-group {{{ $errors->has('gender') ? 'error' : '' }}}">
            {{ Form::label('select', 'Gender', array('class' => 'col-lg-2 control-label')) }}
            <div class="col-lg-3">
                {{ Form::select('gender', array('Male'=>'Male','Female'=>'Female'),NULL,array('class'=>'form-control','id'=>'select')) }}
                {{ $errors->first('gender') }}
            </div>
        </div>
        <!-- Nationality -->
        <div class="form-group {{{ $errors->has('nationality') ? 'error' : '' }}}">
            {{ Form::label('inputnationality', 'Nationality', array('class' => 'col-lg-2 control-label')) }}
            <div class="col-lg-10">
                {{ Form::text('nationality',$guest_id->nationality,array('class'=>'form-control','id'=>'inputnationality','placeholder'=>'Nationality',
                'autocomplete'=>'off','style' => 'cursor: pointer; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;'))}}
                {{ $errors->first('nationality') }}
            </div>
        </div>

        <!--First Name -->
        <div class="form-group {{{ $errors->has('name') ? 'error' : '' }}}">
            {{ Form::label('inputfirstname', 'Name', array('class' => 'col-lg-2 control-label')) }}
            <div class="col-lg-10">
                {{ Form::text('name',$guest_id->name,array('class'=>'form-control','id'=>'inputfirstname','placeholder'=>'First Name',
                'autocomplete'=>'off','style' => 'cursor: pointer; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;'))}}
                {{ $errors->first('name') }}
            </div>
        </div>

        <!-- Lastname -->
        <div class="form-group {{{ $errors->has('lastname') ? 'error' : '' }}}">
            {{ Form::label('inputlastname', 'Lastname', array('class' => 'col-lg-2 control-label')) }}
            <div class="col-lg-10">
                {{ Form::text('lastname',$guest_id->lastname,array('class'=>'form-control','id'=>'inputlastname','placeholder'=>'Last Name',
                'autocomplete'=>'off','style' => 'cursor: pointer; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;'))}}
                {{ $errors->first('lastname') }}
            </div>
        </div>

        <!-- DateOfBirth -->
        <div class="form-group {{{ $errors->has('dateOfBirth') ? 'error' : '' }}}">
            {{ Form::label('date', 'Date Of Birth', array('class' => 'col-lg-2 control-label')) }}
            <div class="col-lg-10">
                {{ Form::text('dateOfBirth',$guest_id->dateOfBirth,array('class'=>'form-control','id'=>'date','placeholder'=>'Date of Birth',
                'autocomplete'=>'off','style' => 'cursor: pointer; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;'))}}
                {{ $errors->first('dateOfBirth') }}
            </div>
        </div>


        <!-- address -->
        <div class="form-group {{{ $errors->has('address') ? 'error' : '' }}}">
            {{ Form::label('inputaddress', 'Address', array('class' => 'col-lg-2 control-label')) }}
            <div class="col-lg-10">
                {{ Form::textarea('address',$guest_id->address,array('class'=>'form-control','rows'=>'3','id'=>'inputaddress','placeholder'=>'Address',
            'autocomplete'=>'off','style' => 'cursor: pointer; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;'))}}
                {{ $errors->first('address') }}
            </div>
        </div>

        <!-- telephone number -->
        <div class="form-group {{{ $errors->has('tel') ? 'error' : '' }}}">
            {{ Form::label('inputtel', 'Tel.', array('class' => 'col-lg-2 control-label')) }}
            <div class="col-lg-10">
                {{ Form::text('tel',$guest_id->tel,array('class'=>'form-control','id'=>'inputtel','placeholder'=>'Telephone Number',
                'autocomplete'=>'off','style' => 'cursor: pointer; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;'))}}
                {{ $errors->first('tel') }}
            </div>
        </div>

        <!-- passport number -->
        <div class="form-group {{{ $errors->has('passportNo') ? 'error' : '' }}}">
            {{ Form::label('inputpassportNo', 'Passport No.', array('class' => 'col-lg-2 control-label')) }}
            <div class="col-lg-10">
                {{ Form::text('passportNo',$guest_id->passportNo,array('class'=>'form-control','id'=>'inputpassportNo','placeholder'=>'Passport Number',
                'autocomplete'=>'off','style' => 'cursor: pointer; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;'))}}
                {{ $errors->first('passportNo') }}
            </div>
        </div>

        <!-- citizen card number -->
        <div class="form-group {{{ $errors->has('citizenCardNo') ? 'error' : '' }}}">
            {{ Form::label('inputCiticenID', 'Citizen ID.', array('class' => 'col-lg-2 control-label')) }}
            <div class="col-lg-10">
                {{ Form::text('citizenCardNo',$guest_id->citizenCardNo,array('class'=>'form-control','id'=>'inputCiticenID','placeholder'=>'Citizen ID',
                'autocomplete'=>'off','style' => 'cursor: pointer; background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QsPDhss3LcOZQAAAU5JREFUOMvdkzFLA0EQhd/bO7iIYmklaCUopLAQA6KNaawt9BeIgnUwLHPJRchfEBR7CyGWgiDY2SlIQBT/gDaCoGDudiy8SLwkBiwz1c7y+GZ25i0wnFEqlSZFZKGdi8iiiOR7aU32QkR2c7ncPcljAARAkgckb8IwrGf1fg/oJ8lRAHkR2VDVmOQ8AKjqY1bMHgCGYXhFchnAg6omJGcBXEZRtNoXYK2dMsaMt1qtD9/3p40x5yS9tHICYF1Vn0mOxXH8Uq/Xb389wff9PQDbQRB0t/QNOiPZ1h4B2MoO0fxnYz8dOOcOVbWhqq8kJzzPa3RAXZIkawCenHMjJN/+GiIqlcoFgKKq3pEMAMwAuCa5VK1W3SAfbAIopum+cy5KzwXn3M5AI6XVYlVt1mq1U8/zTlS1CeC9j2+6o1wuz1lrVzpWXLDWTg3pz/0CQnd2Jos49xUAAAAASUVORK5CYII=); background-attachment: scroll; background-position: 100% 50%; background-repeat: no-repeat;'))}}
                {{ $errors->first('citizenCardNo') }}
            </div>
        </div>

        <!-- comment -->
        <div class="form-group {{{ $errors->has('comment') ? 'error' : '' }}}">
            {{ Form::label('inputcomment', 'Comment', array('class' => 'col-lg-2 control-label')) }}
            <div class="col-lg-10">
                {{ Form::textarea('comment',$guest_id->comment,array('class'=>'form-control','rows'=>'3','id'=>'inputaddress'))}}
                {{ $errors->first('comment') }}
            </div>
        </div>
        
      
        <!-- Submit button -->
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                {{ Form::submit('Submit', array('class' => 'btn btn-primary','onclick'=>'document.getElementById("submit").className += " disabled"','id'=>'submit')) }}
                {{ HTML::link('guest','cancel',array('class' => 'btn btn-default')) }}
                <!-- only manager can delete guest-->
                @if(User::find(auth::id())->role=='manager')

                {{ HTML::link('delete_guest/'.$hotel_id->id.'/'.$guest_id->id,'Delete',array('class' => 'btn btn-danger pull-right','onclick'=>"return confirm('Are you sure you want to delete this guest?')")) }}
                
                @endif
            </div>
        </div>

    </fieldset>
    {{Form::close()}}
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
        format : 'yyyy-mm-dd',
        selectYears: true,
        selectMonths: true,
        selectYears: 30,
        max: new Date('Today')
    });
});   
</script>
@stop