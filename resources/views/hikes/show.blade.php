@extends('layouts.base')

@section('title')
    Course {{ $hike->name }}
@endsection

@section('body-content')
    <div class="container mt-4 table-responsive text-center">
        <div class="jumbotron pt-2 pb-2">
            <div class="row">
                <div class="col-sm-12 d-flex justify-content-end">
                    @if(Auth::check())
                        <div class="p-2">
                            @if((Auth::user()->hasRole("hike_manager")) || Auth::user()->hasRole("admin"))
                                <a href="{{route('hikes.edit',$hike)}}" class="btn btn-outline-primary"><i class="far fa-edit fa-2x"></i></a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
            <h1 class="display-4">{{ $hike->name }}</h1>
            <p class="lead">Etat: {{ $hike->state->name }}</p>
            <hr class="my-4">
            <div class="text-left">
                <p>
                    Rendez-vous: {{ $hike->meeting_location }} {{ \App\Helpers\Helpers::formatRelativeDate(date("Y-m-d H:i:s"),$hike->meeting_date) }}
                </p>
                <p>
                    Départ {{ \App\Helpers\Helpers::formatRelativeDate($hike->meeting_date,$hike->beginning_date) }}, retour {{ \App\Helpers\Helpers::formatRelativeDate($hike->beginning_date,$hike->ending_date) }}
                </p>
                @if (count($hike->destinations) > 0)
                    <p>
                        Parcours: {{ implode(' -> ', $hike->destinations()->pluck('location')->toArray()) }}
                    </p>
                @endif
                <p>
                    Difficulté technique {{ $hike->difficulty }}, Dénivelé : {{ $hike->drop_in_altitude }}m
                </p>
            </div>
            <hr>
            <div class="text-left">
                <p>Guides : {{ implode(', ', $hike->guides()->pluck('firstname')->toArray()) }}</p>
                <p>Participants : {{ implode(', ', $hike->participants()->pluck('firstname')->toArray()) }}</p>
                @if ($hike->isOpen())
                    <p>Nombre prévu : entre {{ $hike->min_num_participants }} et {{ $hike->max_num_participants }}</p>
                @endif
            </div>
            @if (count($hike->equipment)+count($hike->trainings) > 0)
                <hr>
                <div class="text-left">
                    @if (count($hike->equipment) > 0)
                        <p>Equipement obligatoire : {{ implode(', ', $hike->equipment()->pluck('name')->toArray()) }}</p>
                    @endif
                    @if (count($hike->trainings) > 0)
                        <p>Cours requis : {{ implode(', ', $hike->trainings()->pluck('description')->toArray()) }}</p>
                    @endif
                </div>
            @endif
            @if($hike->additional_info)
                <hr>
                <div class="text-left">
                    {{ $hike->additional_info }}
                </div>
            @endif
            
            @if(Auth::check())
            {{ dd($hike->couldBeRegistered())}}

                <hr>
                <div class="p-2 text-left">
                    @if($hike->users()->where('user_id', Auth::user()->id)->exists())
                        <a href="{{ route('hike.unregisterhike', $hike->id) }}" class="btn btn-outline-danger"><i class="far fa-minus-square fa-2x"></i></a>
                    @elseif($hike->state->id == 2)  
                        <a href="{{ route('hike.registerhike', $hike->id) }}" class="btn btn-outline-success"><i class="far fa-plus-square fa-2x"></i></a>
                    @endif
                </div>
            @endif
        </div>
    </div>
    @endsection
