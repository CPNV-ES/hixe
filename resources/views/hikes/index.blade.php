@extends('layouts.base')

@section('title', 'Toutes les courses')

@section('body-content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jq-3.3.1/dt-1.10.20/b-1.6.1/b-flash-1.6.1/kt-2.5.1/r-2.2.3/rg-1.1.1/rr-1.2.6/sc-2.0.1/sp-1.0.1/sl-1.3.1/datatables.min.css"/>
<div class="container mt-4 table-responsive">
    <table  id="hikesTable"  class="table table table-hover mt-3">
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
            <tr onclick="location.href='{{ route('hikes.show', $hike) }}'">
                <td scope="row">{{ $hike->name }}</td>
                <td>{{ date('d.m.Y à H:i:s', strtotime($hike->meeting_date)) }}</td>
                <td>{{ implode(', ', $hike->destinations()->pluck('location')->toArray()) }}</td>
                <td>{{ implode(', ', $hike->guides()->pluck('firstname')->toArray()) }}</td>
                <td>{{ $hike->users()->count() }}</td>
                <td>{{ $hike->min_num_participants }}</td>
                <td>{{ $hike->max_num_participants }}</td>
                <td>{{ $hike->state->name }}</td>
                <td><a href="{{ route('hikes.destroy',$hike)}}">x</a></td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        var table = $('#hikesTable').DataTable();
        $('#hikesTable tbody').on('click', 'tr', function() {
            window.location = $(this).data('hikeurl');
        });
    });
</script>
@endsection
