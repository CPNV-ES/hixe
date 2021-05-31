@extends('layouts.base')

@section('title', 'Calendrier')

@section('body-content')
    <div class="container fluid">
        <h1>Calendar</h1>
        <div class="row">
            <div class="col-lg-2 mb-2">
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
                        <button class="btn btn-primary dropdown-toggle w-100" name="type" type="button" id="type"
                            data-toggle="dropdown" data-value="all" aria-haspopup="true" aria-expanded="false">
                            Tous
                        </button>
                        <div class="dropdown-menu" aria-labelledby="type">
                            <button class="dropdown-item" data-value="all">Tous</button>
                            @foreach ($hike_types as $type)
                                <button class="dropdown-item" data-value="{{ $type->id }}">{{ $type->name }}</button>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="difficulty">Difficulté</label>
                    <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle w-100" name="difficulty" type="button"
                            id="difficulty" data-toggle="dropdown" data-value="all" aria-haspopup="true"
                            aria-expanded="false">
                            Toutes
                        </button>
                        <div class="dropdown-menu" aria-labelledby="difficulty">
                            <button class="dropdown-item" data-value="all">Toutes</button>
                            @for ($i = 1; $i <= 10; $i++)
                                <button class="dropdown-item" data-value="{{ $i }}">{{ $i }}</button>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <button id="resetFilters" class="btn btn-primary">Réinitilaiser</button>
                </div>
            </div>
            <div class="col-lg-10">
                <div id='calendar'></div>
            </div>
        </div>
    </div>
    <script src="/lib/moment/moment.min.js"></script>
    <script src='/lib/fullcalendar/fullcalendar.min.js'></script>
    <link rel='stylesheet' href='/lib/fullcalendar/fullcalendar.min.css' />
    <style>
        .fc-day:hover {
            background: lightblue;
            cursor: pointer;
        }

    </style>
    <script>
        $(document).ready(function() {

            // page is now ready, initialize the calendar...
            const calendar = $('#calendar').fullCalendar({
                // put your options and callbacks here
                events: async (start, end, timezone, callback) => {
                    const querystring = new URLSearchParams({
                        start_date: start.unix(),
                        end_date: end.unix(),
                        type: $('#type').data('value'),
                        difficulty: $('#difficulty').data('value'),
                    }).toString();

                    const response = await axios.get(`/hikes?${querystring}`);
                    const hikes = response.data;

                    callback(hikes.map(hike => {
                        return {
                            title: hike.name,
                            start: hike.beginning_date,
                            end: hike.ending_date,
                            url: `hikes/${hike.id}`,
                        }
                    }));
                },
                dayClick: function(date, jsEvent, view) {
                    var newdate = moment(date).format("YYYY-MM-DD");
                    window.location.href = "/hikes_calendar/" + newdate;
                },
                eventClick: function(info) {
                    info.jsEvent.preventDefault(); // don't let the browser navigate

                    if (info.event.url) {
                        window.open(info.event.url);
                    }
                },

            });

            $(".dropdown-item").click(function() {
                const button = $(this).parents(".dropdown").find('.btn');

                button.html($(this).text() + ' <span class="caret"></span>');
                button.val($(this).data('value'));
                button.data('value', $(this).data('value'));

                calendar.fullCalendar('refetchEvents');
            });

            $("#resetFilters").click(function() {
                const type = $('#type');
                const difficulty = $('#difficulty');

                type.html($(type).next().children().first().text() + ' <span class="caret"></span>');
                difficulty.html($(difficulty).next().children().first().text() +
                    ' <span class="caret"></span>');

                type.data('value', 'all');
                difficulty.data('value', 'all');

                calendar.fullCalendar('refetchEvents');
            });
        });

    </script>
@endsection
