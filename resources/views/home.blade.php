@extends('layouts.base')

@section('title', 'Accueil')

@section('body-content')
    <div class="content">
        <div class="row justify-content-md-center mt-4">
            <div class="col-md-10">
                @if(Auth::check())
                    <h2>Mes courses</h2>
                    <table id="hikesTable" class="table table table-hover mt-3">
                        <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Date</th>
                            <th scope="col">Guide</th>
                            <th scope="col">Avec</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($hikes as $hike)
                            <tr class="select {{ $hike->beginning_date < date('Y-m-d H:i:s') ? 'oldhike' : '' }}" onclick="location.href='{{ route('hikes.show', $hike) }}'">
                                <th scope="row">{{ $hike->name }}</th>
                                <td>{{ \Carbon\Carbon::parse($hike->meeting_date)->format('d M Y') }}</td>
                                <td>{{ implode(', ', $hike->guides()->pluck('firstname')->toArray()) }}</td>
                                <td>{{ implode(', ', $hike->users()->pluck('firstname')->toArray()) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <a class="btn btn-primary" href="{{route('hikes.create')}}">Créer une nouvelle course</a>
                @else
                    <h1>Vous devez vous authentifier pour accéder à Hixe</h1>
                @endif
            </div>
        </div>
    </div>
@endsection
