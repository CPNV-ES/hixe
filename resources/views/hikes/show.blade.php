@extends('layouts.base')

@section('title', 'Toutes les courses')

@section('body-content')
<div class="container mt-4 table-responsive text-center">
    <div class="jumbotron pt-2 pb-2">
        <div class="row">
            <div class="col-sm-12 d-flex justify-content-end">
                <div class="p-2">
                    <a href="{{route('hikes.edit',$hike)}}" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                </div>
                <div class="p-2">
                    <form action="{{route('hikes.destroy',$hike)}}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE"/>
                    <button type="submit" class="btn btn-outline-danger" onclick='return confirm("Êtes vous sûr de vouloir supprimer : {{ $hike->name }} ?")'><i class="fas fa-trash-alt"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <h1 class="display-4">{{ $hike->name }}</h1>
        <p class="lead">{{ $hike->additional_info }}</p>
        <hr class="my-4">
        <div class="row">
            <div class="col-sm-4">
                <p class="lead">Date de la réunion</p>
                <p>{{ date('d.m.Y à H:i:s', strtotime($hike->meeting_date)) }}</p>
            </div>
            <div class="col-sm-4">
                <p class="lead">Date de début</p>
                <p>{{ date('d.m.Y à H:i:s', strtotime($hike->beginning_date)) }}</p>
            </div>
            <div class="col-sm-4">
                <p class="lead">Date de fin</p>
                <p>{{ date('d.m.Y à H:i:s', strtotime($hike->ending_date)) }}</p>
            </div>
        </div><br>
        <div class="row">
            <div class="col-sm-3">
                <p class="lead">min participants</p>
                <p> {{ $hike->min_num_participants }}</p>
            </div>
            <div class="col-sm-3">
                <p class="lead">max participants</p>
                <p>{{ $hike->max_num_participants }}</p>
            </div>
            <div class="col-sm-3">
                <p class="lead">difficulté</p>
                <p>{{ $hike->difficulty }}</p>
            </div>
            <div class="col-sm-3">
                <p class="lead">Dénivelé</p>
                <p>{{ $hike->drop_in_altitude }} m</p>
            </div>
        </div><hr class="my-4">
        <div class="row">
            <div class="col-sm-4">
                <p class="lead">État</p>
                <p> {{ $hike->state->name }}</p>
            </div>
            <div class="col-sm-4">
                <p class="lead">Destinations</p>
                <p>{{ implode(' -> ', $hike->destinations()->pluck('location')->toArray()) }}</p>
            </div>
            <div class="col-sm-4">
                <p class="lead">Guides</p>
                <p>{{ implode(', ', $hike->guides()->pluck('firstname')->toArray()) }}</p>
            </div>
        </div><hr class="my-4">
        <div class="row">
            <div class="col-sm-4">
                <p class="lead">Participants</p>
                <p> {{ implode(', ', $hike->users()->pluck('firstname')->toArray()) }}</p>
            </div>
            <div class="col-sm-4">
                <p class="lead">Equipement</p>
                <p>{{ implode(', ', $hike->equipment()->pluck('name')->toArray()) }}</p>
            </div>
            <div class="col-sm-4">
                <p class="lead">Training</p>
                <p>{{ implode(', ', $hike->trainings()->pluck('certificate_number')->toArray()) }}</p>
            </div>
        </div>
        <hr class="my-4">
        <div class="row">
            <div class="col-sm-12">
                <h5>Lieu de la réunion</h5>
                <p> {{ $hike->meeting_location }}</p>
                <p><iframe width="1000" height="600" id="gmap_canvas" src="https://maps.google.com/maps?q={{ $hike->meeting_location }}&t=k&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></p>
            </div>
        </div>
      </div>
    </div>
</div>
@endsection
