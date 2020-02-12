@extends('layouts.base')

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
                    <label>Départ</label>
                    <input type="time" class="form-control">
                </div>
                <div class="form-group offset-1 col-md-2">
                    <label>Retour</label>
                    <input type="time" class="form-control">
                </div>
                <div class="form-group offset-3 col-md-4">
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
                    <label>Description</label>
                    <textarea class="form-control"></textarea>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label>Dénivelé</label>
                    <div class="input-group">
                        <input type="number" class="form-control">
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
                    <select class="form-control">
                        <option selected value="">1</option>
                        <option value="">2</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label>Participants</label>
                    <div class="input-group">
                        <input type="number" class="form-control">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                min
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <input type="number" class="form-control">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                max
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        function addRow(parent) {
            parent.querySelector('.btn').hidden = false;
            var rows = parent.querySelectorAll('tbody tr');
            var lastRow = rows[rows.length - 1].cloneNode(true);
            lastRow.querySelectorAll('input').forEach(function(elem){
                elem.value = "";
            });
            lastRow.querySelector('.btn').addEventListener('click', (a) => { // () => Is like function() but doesn't keep the scope
                deleteRow(lastRow);
            });
            parent.querySelector('tbody').appendChild(lastRow);
        }

        function deleteRow(child) {
            var parent = child.parentElement;
            parent.removeChild(child);
            if (parent.querySelectorAll('tr').length < 2) {
                parent.querySelector('.btn').hidden = true;
            }
        }

        // Add course row on click
        addRowCourse.addEventListener('click', function() {
            addRow(this.parentElement.querySelector('table'));
        });

        // Add material row on click
        addRowMaterial.addEventListener('click', function() {
            addRow(this.parentElement.querySelector('table'));
        });

        document.querySelectorAll('tbody .btn').forEach(function (elem) {
            elem.addEventListener('click', function(){
                deleteRow(elem.parentElement.parentElement.parentElement)
            });
        });
    </script>
@endsection
