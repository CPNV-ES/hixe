@extends('layouts.base')

@section('title', 'Toutes les courses')

@section('body-content')
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Date</th>
            <th scope="col">Destination</th>
            <th scope="col">Guide</th>
            <th scope="col">Inscrits</th>
            <th scope="col">Maximum</th>
            <th scope="col">État</th>
        </tr>
    </thead>

    <tbody>

    @foreach ($hikes as $hike)
    <tr>
        <th scope="row">{{ $hike->meeting_date }}</td>
        <td>{{ implode(', ', $hike->destinations()->pluck('location')->toArray()) }}</td>
        <td>{{ implode(', ', $hike->guides()->pluck('firstname')->toArray()) }}</td>
        <td>{{ count($hike->users()->get()) }}</td>
        <td>{{ $hike->max_num_participants }}</td>
        <td>{{ $hike->states->name}}</td>
    </tr>
    @endforeach
</tbody>
</table>
@endsection
