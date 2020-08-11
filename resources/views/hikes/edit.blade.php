@extends('layouts.base')
@push('scripts')
    <script src="{{ asset('/js/hixe-form-edition.js') }}"></script>
@endpush

@section('title', 'Accueil')

@section('body-content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center pagetitle">Éditer la course {{ $hike->name }}</h1>
            </div>
        </div>

        <form method="post" action="{{ route('hikes.update',$hike) }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            @include('hikes.editmaindata')
            <div class="form-group offset-8 col-md-2">
                <input type="submit" class="btn btn-primary" value="Enregistrer">
            </div>
        </form>
    </div>
@endsection
