
@extends('layouts.base')

@section('title', 'Calendrier')

@section('body-content')
<link rel='stylesheet' href='/lib/fullcalendar/fullcalendar.min.css' />

<div class="container">
<h3>{{date('d  M  Y',strtotime($date))}}</h3>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Destination</th>
            <th scope="col">Guide</th>
            <th scope="col">Inscrits</th>
            <th scope="col">Min</th>
            <th scope="col">Max</th>
            <th scope="col">Etat</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($dayHikes as $hike)
          <tr>
            <th scope="row"></th>
            <td>{{$hike->name}}</td>
            <td>{{ implode(', ', $hike->destinations()->pluck('location')->toArray()) }}</td>
            <td>{{ implode(', ', $hike->guides()->pluck('firstname')->toArray()) }}</td>
            <td>{{ $hike->users()->count() }}</td>
            <td>{{ $hike->min_num_participants }}</td>
            <td>{{ $hike->max_num_participants }}</td>
            <td>{{ $hike->state->name }}</td>
          </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        <a href="{{route('hikes.create')}}">
            <input value="Ajouter un évenement" type="submit" class="btn btn-primary"/>
        </a>
        <a href="/hikes_calendar">
            <input value="Retour" type="button" class="btn btn-primary"/>
        </a>
    </div>
</div>
@endsection
