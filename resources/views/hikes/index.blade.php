@extends('layouts.base')

@section('title', 'Toutes les courses')

@section('body-content')

<div class="container-fluid mt-4 table-responsive">
    @if(isset($hikes) && !$hikes->isEmpty())
        <table id="hikesTable" class="table table-hover mt-3">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Date</th>
                    <th scope="col">Destination</th>
                    <th scope="col">Guide</th>
                    <th scope="col">Inscrits</th>
                    <th scope="col">Minimum</th>
                    <th scope="col">Maximum</th>
                    <th scope="col">État</th>
                    @if(Auth::check())
                        <th class="text-center" scope="col"> Inscription </th>
                        
                        @if((Auth::user()->hasRole("hike_manager")) || Auth::user()->hasRole("admin"))
                            <th class="text-center" colspan="2" scope="col">Gestion</th>
                        @endif
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($hikes as $hike)
                    <tr onclick="location='{{ route('hikes.show', $hike) }}'">
                        <td scope="row">{{ $hike->name }}</td>
                        <td>{{ date('d.m.Y à H:i:s', strtotime($hike->meeting_date)) }}</td>
                        <td>{{ implode(', ', $hike->destinations()->pluck('location')->toArray()) }}</td>
                        <td>{{ implode(', ', $hike->guides()->pluck('firstname')->toArray()) }}</td>
                        <td>{{ $hike->users()->count() }}</td>
                        <td>{{ $hike->min_num_participants }}</td>
                        <td>{{ $hike->max_num_participants }}</td>
                        <td>{{ $hike->state->name }}</td>

                        @if(Auth::check())
                            @if($hike->couldBeRegistered())
                                @if($hike->users()->where('user_id', Auth::user()->id)->exists())
                                    <td class="text-center"><a href="{{ route('hike.unregisterhike', $hike->id) }}" class="btn btn-outline-danger"><i class="far fa-minus-square"></i></a></td>
                                @elseif($hike->state->id == 2)  
                                    <td class="text-center"><a href="{{ route('hike.registerhike', $hike->id) }}" class="btn btn-outline-success"><i class="far fa-plus-square"></i></a></td>
                                @else
                                    <td></td>
                                @endif
                            @else
                                <td></td>
                            @endif
                            @if((Auth::user()->hasRole("hike_manager")) || Auth::user()->hasRole("admin"))
                                <td class="text-center">
                                    <a href="{{route('hikes.edit',$hike)}}" class="btn btn-outline-primary"><i class="far fa-edit"></i></a>
                                </td>
                                <td class="text-center">
                                    <form action="{{route('hikes.destroy',$hike)}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE"/>
                                        <button type="submit" class="btn btn-outline-danger" onclick='return confirm("Êtes vous sûr de vouloir supprimer : {{ $hike->name }} ?")'><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            @endif
                        @endif
                    </tr>
                @endforeach
        </tbody>
    </table>
    @else
        <div class="p-3 mb-2 bg-light text-dark"> Aucunes courses n'existent actuellement. </div>
    @endif
    <a class="btn btn-primary" href="{{route('hikes.create')}}">Créer une nouvelle course</a>
</div>

<script>
    $(document).ready(function() {
        $('#hikesTable').DataTable();
    });
</script>
@endsection