@extends('layouts.base')

@section('title', 'Toutes les courses')

@section('body-content')

<div class="container-fluid mt-4 table-responsive">
    @if(isset($hikes) && !$hikes->isEmpty())
        <div class="container-fluid">
            <div class="col-2 position-relative search-bar">
                <form method="GET">
                    <div class="input-group mb-3"> 
                    <input id="search" name="q" type="search" class="form-control" value="{{$query ?? ""}}" autocomplete="off">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                    <div id="search-results" class="search-results"></div>
                </form>
            </div>
        </div>
        <table id="hikesTable" class="table mt-3">
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
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
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
                        @if($hike->users()->where('user_id', Auth::user()->id)->exists())
                            <td>Déjà inscrit</td>
                        @elseif($hike->state->id == 2)
                            <td><a href="{{ route('hike.registerhike', $hike->id) }}" class="btn btn-outline-primary"><i class="far fa-plus-square"></i></a></td>
                        @else
                            <td class="text-muted font-italic">Indisponible</td>
                        @endif
                        <td><a href="{{route('hikes.edit',$hike)}}" class="btn btn-outline-primary"><i class="far fa-edit"></i></a></td>
                        <td>
                            <form action="{{route('hikes.destroy',$hike)}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE"/>
                                <button id="delete-btn" type="submit" class="btn btn-outline-danger" data-name="{{$hike->name}}"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
        </tbody>
    </table>
    @else
        <div class="p-3 mb-2 bg-light text-dark">
            @if(isset($query))
                <p>Aucun résultat ne correspond à votre recherche</p>
                <a class="btn btn-primary" href="{{url()->current()}}">Annuler la recherche</a>
            @else
                <p>Aucunes courses n'existent actuellement.</p>
            @endif
        </div>
    @endif
    <a class="btn btn-primary" href="{{route('hikes.create')}}">Créer une nouvelle course</a>
</div>

<script>
    $(document).ready(function() {
        $('#hikesTable').DataTable({
            searching: false,
        });
    });

    $("#delete-btn").on("click", function(evt) {
        var confirmed = confirm("Êtes vous sûr de vouloir supprimer : " + $("#delete-btn").data("name"));

        if (!confirmed) {
            evt.stopPropagation();
            evt.preventDefault();
        }
    });

    $("#search").on("input", function(evt) {
        var query = evt.target.value;

        if (query.length === 0) {
            $("#search-results").empty();
        }

        if (query.length < 3) {
            return;
        }

        $.ajax({
            url: "/api/users/search?q=" + query,
        }).done(function(data) {
            var users = data;

            $("#search-results").empty();

            for(var i = 0; i < users.length; i++) {
                var user = users[i];
                var fullname = user.firstname + " " + user.lastname;

                var row = $("<div></div>");
                row.addClass("search-results__row");

                var link = $("<a></a>");
                link.addClass("search-results__link");
                link.attr("href", "?q=" + fullname)
                link.text(fullname);
                row.append(link);

                $("#search-results").append(row);
            }

        });
    });
</script>
@endsection