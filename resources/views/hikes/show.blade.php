@extends('layouts.base')

@section('title', 'Toutes les courses')

@section('body-content')
<div class="container mt-4 table-responsive">
    <p>Name : {{ $hike->name }}</p>
    <p>meeting location : {{ $hike->meeting_location }}</p>
    <p>meeting date : {{ date('d.m.Y à H:i:s', strtotime($hike->meeting_date)) }}</p>
    <p>beginning date : {{ date('d.m.Y à H:i:s', strtotime($hike->beginning_date)) }}</p>
    <p>eding date : {{ date('d.m.Y à H:i:s', strtotime($hike->ending_date)) }}</p>
    <p>min participant : {{ $hike->min_num_participants }}</p>
    <p>max participant : {{ $hike->max_num_participants }}</p>
    <p>difficulté : {{ $hike->difficulty }}</p>
    <p>Info : {{ $hike->additional_info }}</p>
    <p>Dénivelé : {{ $hike->drop_in_altitude }}</p>
    <p>État : {{ $hike->state->name }}</p>
    <p>Destinations :{{ implode(', ', $hike->destinations()->pluck('location')->toArray()) }}</p>
    <p>Guides : <td>{{ implode(', ', $hike->guides()->pluck('firstname')->toArray()) }}</td></p>
    <p>Participant: {{ implode(', ', $hike->users()->pluck('firstname')->toArray()) }}</p>
<!--<p>Equipement:  implode(', ', $hike->equipments()->pluck('name')->toArray()) </p> -->
    <p>Training: {{ implode(', ', $hike->trainings()->pluck('certificate_number')->toArray()) }}</p>
    <p><a href="{{route('hikes.edit',$hike)}}"><i class="far fa-edit"></i></a></p>
    <p><a href="{{route('hikes.destroy',$hike)}}"><i class="fas fa-trash-alt"></i></a></p>
    <p><iframe width="1000" height="600" id="gmap_canvas" src="https://maps.google.com/maps?q={{ $hike->meeting_location }}&t=k&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></p>
</div>
@endsection
