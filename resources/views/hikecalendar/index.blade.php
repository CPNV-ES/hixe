
@extends('layouts.base')

@section('title', 'Calendrier')

@section('body-content')
{{-- <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' /> --}}


<div class="container">
    <h1>Calendar</h1>
<div id='calendar'></div>
</div>
{{-- <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script> --}}
<script src="/lib/jquery/jquery.min.js"></script>
<script src="/lib/moment/moment.min.js"></script>
<script src='/lib/fullcalendar/fullcalendar.min.js'></script>
<link rel='stylesheet' href='/lib/fullcalendar/fullcalendar.min.css'/>
<style>
    .fc-day:hover{
        background:lightblue;
        cursor: pointer;
    }

 </style>
<script>
     $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            events : [
                @foreach($hikes as $hike)
                {
                    title : '{{ $hike->name }}',
                    start : '{{ $hike->beginning_date }}',
                    end : '{{$hike->ending_date}}',
                    url: 'hikes/{{$hike->id}}',

                },
                @endforeach
            ],

            dayClick: function(date, jsEvent, view) {
                var newdate = moment(date).format("YYYY-MM-DD");
                window.location.href ="/hikes_calendar/"+newdate;
            },
            eventClick: function(info) {
                info.jsEvent.preventDefault(); // don't let the browser navigate

                if (info.event.url) {
                    window.open(info.event.url);
                }
            },

        })
    });


</script>
@endsection
