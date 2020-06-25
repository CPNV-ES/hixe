@extends('layouts.base')
@push('scripts')
    <script src="{{ asset('/js/hixe-form.js') }}"></script>
@endpush

@section('title', 'Accueil')

@section('body-content')

    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous">
    </script>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center pagetitle">Créer une course</h1>
                <h1 class="text-center pagetitle">Nom Hike</h1>
            </div>
        </div>

        <form method="POST" action="{{ route('hikes.store') }}" enctype="multipart/form-data">
            @csrf
            @include('subviews/subviewhike', $hike)
            <div class="form-group offset-8 col-md-2">
                <input type="submit" class="btn btn-primary" value="Sauvegarder">
            </div>
        </form>
    </div>
    
    @endsection
