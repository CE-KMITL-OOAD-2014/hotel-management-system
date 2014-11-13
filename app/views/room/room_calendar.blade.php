@extends('layouts.master')
@section('head')
@parent
{{ HTML::style('fullcalendar-2.1.1/fullcalendar.css') }}
{{ HTML::script('js/jquery-1.11.1.min.js')}}
{{ HTML::style('fullcalendar-2.1.1/fullcalendar.print.css',array('rel'=>'stylesheet','media'=>'print')) }}
{{ HTML::script('fullcalendar-2.1.1/lib/moment.min.js') }}
{{ HTML::script('fullcalendar-2.1.1/fullcalendar.min.js') }}

<script>
    /*
            jQuery document ready
            */
            
            $(document).ready(function()
            {
            /*
                date store today date.
                d store today date.
                m store current month.
                y store current year.
                */
                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
                
            /*
                Initialize fullCalendar and store into variable.
                Why in variable?
                Because doing so we can use it inside other function.
                In order to modify its option later.
                */
                
                var calendar = $('#calendar').fullCalendar(
                {
                /*
                    header option will define our calendar header.
                    left define what will be at left position in calendar
                    center define what will be at center position in calendar
                    right define what will be at right position in calendar
                    */
                    header:
                    {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,basicWeek,basicDay'
                    },
                /*
                    defaultView option used to define which view to show by default,
                    for example we have used agendaWeek.
                        */
                    defaultView: 'basicWeek',
                /*
                    selectable:true will enable user to select datetime slot
                    selectHelper will add helpers for selectable.
                    */
                    selectable: false,
                    selectHelper: false,
                   
                /*
                    editable: true allow user to edit events.
                    */
                    editable: false,
                /*
                    events is the main option for calendar.
                    for demo we have added predefined events in json object.
                        */
                    eventSources:[
                    {
                        url: '{{URL::to('api/room/Occupied/'.$hotel_id)}}',
                        color: '#3498db',
                        textColor : '#ffffff'
                    },
                    {
                        url: '{{URL::to('api/room/Reserved/'.$hotel_id)}}',
                        color: '#f39c12',
                        textColor : '#ffffff'
                    },
                    {
                        url: '{{URL::to('api/room/Maintenance/'.$hotel_id)}}',
                        color: '#e74c3c',
                        textColor : '#ffffff'
                    },
                    ],

                    eventClick: function(event) {
                     if (event.url) {
                         return confirm("Are you sure you want to delete this event?");
                     }
                 }

             });

});

</script>
@stop

@section('title')
@parent
:: My room
@stop
@section('styles')
@parent
#calendar {
max-width: 900px;
margin: 0 auto;
padding-top: 0px;
}
.right {
max-width: 900px;
margin: 0 auto;
text-align : right;
padding-bottom: 5px;
}

@stop
@section('content')



<div class="right">
<span class="label label-info">Occupied</span>
<span class="label label-warning">Reserved</span>
<span class="label label-danger">Maintenance</span>
</div>
<!--FullCalendar container div-->
<div id='calendar'>
</div>
@stop
@section('js')
{{ HTML::script('js/bootstrap.min.js') }}
@stop