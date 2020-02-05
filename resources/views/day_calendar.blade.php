
@extends('layouts.base')

@section('title', 'Calendrier')

@section('body-content')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

<h3>Calendar</h3>
<div class="container">
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
    <div><input value="Ajouter un évenement" type="submit" class="btn btn-primary"/></div>
</div>
@endsection
