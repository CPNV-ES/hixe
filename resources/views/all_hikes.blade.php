@extends('layouts.base')

@section('title', 'Toutes les courses')

@section('body-content')
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<div class="container mt-4">
    <table  id="hikesTable"  class="table table-hover mt-3">
        <input class="form-control" id="filterName" type="text" placeholder="Search..">
  <br>
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col">Destination</th>
                <th scope="col">Guide</th>
                <th scope="col">Inscrits</th>
                <th scope="col">Minimum</th>
                <th scope="col">Maximum</th>
                <th scope="col">État</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($hikes as $hike)
        <tr>
            <th scope="row">{{ $hike->name }}</th>
            <td>{{ $hike->meeting_date }}</td>

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
</div>

<script>
    $(document).ready( function () {
    $('#hikesTable').DataTable();
} );
</script>
@endsection
