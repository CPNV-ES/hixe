@extends('layouts.base')

@section('title', 'Toutes les courses')

@section('body-content')
  <table>
    <tr>
      <th>Date</th>
      <th>Destination</th>
      <th>Guide</th>
      <th>Inscrits</th>
      <th>Maximum</th>
      <th>État</th>
    </tr>

    @foreach ($hikes as $hike)
      <tr>
        <td>{{ $hike->meeting_date }}</td>
        <td>{{ implode(', ', $hike->destinations()->pluck('location')->toArray()) }}</td>
        <td>{{ implode(', ', $hike->guides()->pluck('firstname')->toArray()) }}</td>
        <td>{{ count($hike->users()->get()) }}</td>
        <td>{{ $hike->max_num_participants }}</td>
        <td>{{ $hike->state->name }}</td>
      </tr>
    @endforeach
</table>
@endsection