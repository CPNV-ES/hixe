@extends('layouts.base')

@section('title', 'Calendrier')

@section('body-content')
    <div class="container fluid">
        <h1>Calendar</h1>
        <div class="row">
            <div class="col-lg-2">
                <div class="mb-2">
                    <label for="type">Calendriers</label>
                    <div class="input-group">
                        <div class="custom-control custom-checkbox">
                            <input id="active" type="checkbox" class="custom-control-input" aria-label="Actifs">
                            <label class="custom-control-label" for="active">Actifs</label>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="custom-control custom-checkbox">
                            <input id="aj" type="checkbox" class="custom-control-input" aria-label="AJ">
                            <label class="custom-control-label" for="aj">AJ</label>
                        </div>
                    </div>
                    <div class="input-group">
                        <div class="custom-control custom-checkbox">
                            <input id="oj" type="checkbox" class="custom-control-input" aria-label="OJ">
                            <label class="custom-control-label" for="oj">OJ</label>
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="type">Type</label>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle w-100" name="type" type="button"
                            id="type" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Tous
                        </button>
                        <div class="dropdown-menu" aria-labelledby="type">
                            <a class="dropdown-item" href="#">Haute-route</a>
                            <a class="dropdown-item" href="#">Alpinisme</a>
                        </div>
                    </div>
                </div>
                <div>
                    <label for="difficulty">Difficulté</label>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle w-100" name="difficulty" type="button"
                            id="difficulty" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Toutes
                        </button>
                        <div class="dropdown-menu" aria-labelledby="difficulty">
							@for($i = 1; $i <= 10; $i++)
                            	<a class="dropdown-item" href="#">{{$i}}</a>
							@endfor
                        </div>
                    </div>
                </div>
                </div>
            <div class="col-lg-10">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
    <script src="/lib/jquery/jquery.min.js"></script>
    <script src="/lib/moment/moment.min.js"></script>
    <script src='/lib/fullcalendar/fullcalendar.min.js'></script>
    <link rel='stylesheet' href='/lib/fullcalendar/fullcalendar.min.css' />
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

            $(".dropdown-menu a").click(function(){
                $(this).parents(".dropdown").find('.btn').html($(this).text() + ' <span class="caret"></span>');
                $(this).parents(".dropdown").find('.btn').val($(this).data('value'));
            });
        });
    </script>
@endsection
