@extends('layouts.base')

@section('title', 'Accueil')

@section('body-content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center pagetitle">Créer une course</h1>
                <h1 class="text-center pagetitle">Nom Hike</h1>
            </div>
        </div>

        <form>
            @csrf
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label>Rendez-vous</label>
                    <input type="date" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <label>Heure</label>
                    <input type="time" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label>Lieu du rdv</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group offset-2 col-md-3">
                    <label>Cours requis et Numéro</label>
                    <select class="form-control">
                        <option selected value="">Escalade 5246</option>
                        <option value="">Sauvetage en falaise 5620</option>
                    </select>
                </div>
            </div>



        </form>


    </div>

@endsection
