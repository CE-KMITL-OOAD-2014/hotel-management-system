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
                    selectable: true,
                    selectHelper: true,
                /*
                    when user select timeslot this option code will execute.
                    It has three arguments. Start,end and allDay.
                    Start means starting time of event.
                    End means ending time of event.
                    allDay means if events is for entire day or not.
                    */
                    select: function(start, end, allDay)
                    {

                        location = '{{URL::to('change_room_status/'.$hotel_id)}}'
                    /*
                        if title is enterd calendar will add title and event into fullCalendar.
                            */
                        if (title)
                        {
                            calendar.fullCalendar('renderEvent',
                            {
                                title: title,
                                start: start,
                                end: end,
                                allDay: allDay
                            },
                            true // make the event "stick"
                            );
                        }
                        calendar.fullCalendar('unselect');
                    },
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
                        url: '{{URL::to('room_json/Occupied/'.$hotel_id)}}',
                        color: '#3F51B5',
                        textColor : '#ffffff'
                    },
                    {
                        url: '{{URL::to('room_json/Reserved/'.$hotel_id)}}',
                        color: '#FFB300',
                        textColor : '#ffffff'
                    },
                    {
                        url: '{{URL::to('room_json/Maintenance/'.$hotel_id)}}',
                        color: '#F44336',
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
padding-top: 60px;
}

@stop
@section('content')



<!--FullCalendar container div-->
<div id='calendar'></div>
@stop
@section('js')
{{ HTML::script('js/bootstrap.min.js') }}
@stop