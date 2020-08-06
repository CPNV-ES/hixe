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
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <form method="POST" action="{{ route('hikes.store') }}" enctype="multipart/form-data">
            @csrf
            @include('hikes.editmaindata')
            <div class="form-row justify-content-center">
                <input type="submit" class="btn btn-primary" value="Créer">
            </div>
        </form>
    </div>

@endsection
