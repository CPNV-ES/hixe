
@extends('layouts.base')

@section('title', 'Calendrier')

@section('body-content')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

<h3>Calendar</h3>
<div class="container">
<div id='calendar'></div>
</div>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<style>.fc-day:hover{background:lightblue;cursor: pointer;}.fc-time{
    display : none;
 }</style>
<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            events : [
                @foreach($hikes as $hike)
                {
                    title : '{{ $hike->name }}',
                    start : '{{ $hike->meeting_date }}',
                    end : '{{$hike->ending_date}}',
                    url: 'hikes/{{$hike->id}}',

                },
                @endforeach
            ],

            dayClick: function(date, jsEvent, view) {

                window.location ="hikes_calendar/"+date.format();
            },
            eventClick: function(info) {
                info.jsEvent.preventDefault(); // don't let the browser navigate

                if (info.event.url) {
                    window.open(info.event.url);
                }
            }
        })
    });
</script>
@endsection
