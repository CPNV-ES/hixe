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

        <form method="post" action="/hikes">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Nom du Hike</label>
                    <input type="text" name="hikeName" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-2">
                    <label>Rendez-vous</label>
                    <input type="date" name="dateRdv" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <label>Heure</label>
                    <input type="time" name="timeRdv" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label>Lieu du rdv</label>
                    <input type="text" name="locationRdv" class="form-control">
                </div>
                <div class="form-group offset-1 col-md-4">
                    <table class="table" id="table-cours">
                        <thead>
                        <th>Cours requis</th>
                        <th>Numéro</th>
                        <th></th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="input-group">
                                    <input type="text" name="cours[]" class="form-control"/>
                                </div>
                            </td>
                            <td>
                                <div class="input-group">
                                    <input type="text" name="numcours[]" class="form-control"/>
                                </div>
                            </td>
                            <td>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary" name="remove-cours" hidden>
                                        X
                                    </button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <input type="button" value="Ajouter un cours" class="btn btn-secondary" id="addRowCourse"/>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label>Date de la course</label>
                    <input type="date" name="dateHike" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <label>Départ</label>
                    <input type="time" name="startHike" class="form-control">
                </div>
                <div class="form-group col-md-2">
                    <label>Retour</label>
                    <input type="time" name="endHike" class="form-control">
                </div>
                <div class="form-group offset-2 col-md-4">
                    <table class="table" id="table-equip">
                        <thead>
                        <th>Matériel requis</th>
                        <th></th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <div class="input-group">
                                    <input type="text" name="material[]" class="form-control"/>
                                </div>
                            </td>
                            <td>
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-outline-secondary" name="remove-material" hidden>
                                        X
                                    </button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <input type="button" value="Ajouter un matériel" class="btn btn-secondary" id="addRowMaterial"/>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Destination</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-map-marker-alt"> Départ </i>
                            </div>
                        </div>
                        <input type="text" class="form-control">
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-map-marker-alt">Arrivée</i>
                            </div>
                        </div>
                        <input type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group offset-4 col-md-4">
                    <label>Informations additionnelles</label>
                    <textarea name="addInfo" class="form-control"></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label>Dénivelé</label>
                    <div class="input-group">
                        <input name="dropAltitude" type="number" class="form-control">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                mètres
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-1">
                    <label>Difficulté</label>
                    <select name="difficulty" class="form-control">
                        <option selected value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label>Participants</label>
                    <div class="input-group">
                        <input type="number" name="minParticipants" class="form-control">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                min
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <input type="number" name="maxParticipants" class="form-control">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                max
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group offset-8 col-md-2">
                    <input type="submit" class="btn btn-primary" value="Ajouter">
                </div>
            </div>
        </form>
    </div>
@endsection
