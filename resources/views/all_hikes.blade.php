@extends('layouts.base')

@section('title', 'Toutes les courses')

@section('body-content')
<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<div class="container">
    <table class="table">
        <thead class="thead-dark">
            <tr>
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
            <th scope="row">{{ $hike->meeting_date }}</td>
            <td>{{ implode(', ', $hike->destinations()->pluck('location')->toArray()) }}</td>
            <td>{{ implode(', ', $hike->guides()->pluck('firstname')->toArray()) }}</td>
            <td>{{ count($hike->users()->get()) }}</td>
            <td>{{ $hike->min_num_participants }}</td>
            <td>{{ $hike->max_num_participants }}</td>
            <td>{{ $hike->states->name}}</td>
        </tr>
        @endforeach
    </tbody>
    </table>
</div>

<script>
    $(document).ready(function(){
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});
</script>
@endsection
