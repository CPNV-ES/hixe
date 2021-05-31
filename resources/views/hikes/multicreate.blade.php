@extends('layouts.base')

@section('title', 'Ajouter des courses')

@section('body-content')

    <div class="content">
        <div class="row justify-content-md-center">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">{{__(" Insérer des courses")}}</h5>
                    </div>
                    <div class="card-body">
                        <p><em>Champs obligatoire*</em></p>
                        <div class="row footer ">
                            <div class="col-md-12 pr-1 d-flex justify-content-end" style="padding-bottom: 15px;">
                                <form method="POST" action="{{ route('import.store') }}" enctype="multipart/form-data">
                                    @csrf
                                    <input type="file" accept=".csv" name="csv" class="btn btn-light" >
                                    <button title="Importer" type="submit" class="btn btn-outline-secondary "><i class="fas fa-upload"></i></button>
                                </form>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('multiHikes.store') }}" autocomplete="off"
                              enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <!-- Date -->
                            <div class="row">
                                <div class="col-md-12 pr-1">
                                    <div class="form-group">
                                        <table id="mytable">
                                            <thead>
                                            <td>Nom*</td>
                                            <td>Chef de course*</td>
                                            <td colspan="3">Rendez-vous*</td>
                                            <td>Début*</td>
                                            <td>Fin*</td>
                                            <td>Min Pers.</td>
                                            <td>Max Pers.</td>
                                            <td>Dénivelé*</td>
                                            <td>Difficulté*</td>
                                            <td>Info</td>
                                            </thead>
                                            <tbody>
                                                @if(!empty($validatedHikes))
                                                    @foreach($validatedHikes as $hike)
                                                        <tr id="rows">
                                                            @if(empty($hike->nameError))
                                                                <td><input type="text" name="name[]" class="form-control" value='{{$hike->name}}'></td>
                                                            @else
                                                                <td><input type="text" name="name[]" class="form-control is-invalid" value='{{$hike->name}}' style="border: 1px solid red;"></td>
                                                            @endif
                                                            <td style="padding:10;">
                                                                <select class="form-control" name="chef[]">
                                                                    @foreach($users as $user)
                                                                        <option value="{{$user->id}}">{{$user->firstname}} {{$user->lastname}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            @if(empty($hike->meetingLocationError))
                                                                <td><input type="text" name="meetingLocation[]" class="form-control" value='{{$hike->meetingLocation}}' style=""></td>
                                                            @else
                                                                <td><input type="text" name="meetingLocation[]" class="form-control is-invalid" value='{{$hike->meetingLocation}}'></td>
                                                            @endif
                                                            @if(empty($hike->meetingDateError))
                                                                <td><input type="date" name="meetingDate[]" class="form-control" value='{{$hike->meetingDate}}' onblur="AutoInpute(value, this, 'hikeDate[]')"></td>
                                                            @else
                                                                <td><input type="date" name="meetingDate[]" class="form-control is-invalid" value='{{$hike->meetingDate}}' onblur="AutoInpute(value, this, 'hikeDate[]')"></td>
                                                            @endif
                                                            @if(empty($hike->hikeDateError))
                                                                <td><input type="date" name="hikeDate[]" class="form-control" value='{{$hike->hikeDate}}'></td> 
                                                            @else
                                                                <td><input type="date" name="hikeDate[]" class="form-control is-invalid" value='{{$hike->hikeDate}}'></td> 
                                                            @endif
                                                            @if(empty($hike->startError))
                                                                <td><input type="time" name="start[]" class="form-control" value='{{$hike->start}}' onblur="AutoInpute(value, this, 'finish[]')"></td>
                                                            @else
                                                                <td><input type="time" name="start[]" class="form-control is-invalid" value='{{$hike->start}}' onblur="AutoInpute(value, this, 'finish[]')"></td>
                                                            @endif
                                                            @if(empty($hike->finishError))
                                                                <td><input type="time" name="finish[]" class="form-control" value='{{$hike->finish}}'></td>
                                                            @else
                                                                <td><input type="time" name="finish[]" class="form-control is-invalid" value='{{$hike->finish}}'></td>
                                                            @endif
                                                            @if(empty($hike->minError))
                                                                <td><input type="number" min="1" name="min[]" class="form-control" value='{{$hike->min}}'></td>
                                                            @else
                                                                <td><input type="number" min="1" name="min[]" class="form-control is-invalid" value='{{$hike->min}}'></td>
                                                            @endif
                                                            @if(empty($hike->maxError))
                                                                <td><input type="number" min="1" name="max[]" class="form-control" value='{{$hike->max}}'></td>
                                                            @else
                                                                <td><input type="number" min="1" name="max[]" class="form-control is-invalid" value='{{$hike->max}}'></td>
                                                            @endif
                                                            @if(empty($hike->deniveleError))
                                                                <td><input type="number" min="1" name="denivele[]" class="form-control" value='{{$hike->denivele}}'></td>
                                                            @else
                                                                <td><input type="number" min="1" name="denivele[]" class="form-control is-invalid" value='{{$hike->denivele}}'></td>
                                                            @endif
                                                            @if(empty($hike->difficultyError))
                                                                <td><input type="number" min="1" max="9" name="difficulty[]" class="form-control" value='{{$hike->difficulty}}'></td>
                                                            @else
                                                                <td><input type="number" min="1" max="9" name="difficulty[]" class="form-control is-invalid" value='{{$hike->difficulty}}'></td>
                                                            @endif
                                                            @if(empty($hike->infoError))
                                                                <td><input type="text" name="info[]" class="form-control" value='{{$hike->info}}'></td>
                                                            @else
                                                                <td><input type="text" name="info[]" class="form-control is-invalid" value='{{$hike->info}}'></td>
                                                            @endif
                                                            <td><button title="Supprimer" type="submit" class="btn btn-outline-danger" onclick="deleteRow(this)"><i class="fas fa-trash-alt"></i></button></td>
                                                            @if(empty($hike->nameError || $hike->meetingLocationError || $hike->meetingDateError || $hike->hikeDateError || $hike->startError || $hike->finishError || $hike->minError || $hike->maxError || $hike->deniveleError || $hike->difficultyError || $hike->infoError))
                                                                <td><i title="Importation réussi" class="fas fa-check btn btn-outline-success" style="padding-top: 11px; padding-bottom: 10px;"></i></td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr id="rows">
                                                        <td><input type="text" name="name[]" class="form-control" value=''></td>
                                                        <td>
                                                            <select class="form-control" name="chef[]">
                                                                @foreach($users as $user)
                                                                    <option value="{{$user->id}}">{{$user->firstname}} {{$user->lastname}}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td><input type="text" name="meetingLocation[]" class="form-control" value=''></td>
                                                        <td><input type="date" name="meetingDate[]" class="form-control" value='' onblur="AutoInpute(value, this, 'hikeDate[]')"></td>
                                                        <td><input type="date" name="hikeDate[]" class="form-control"></td>
                                                        <td><input type="time" name="start[]" class="form-control" value='' onblur="AutoInpute(value, this, 'finish[]')"></td>
                                                        <td><input type="time" name="finish[]" class="form-control" value=''></td>
                                                        <td><input type="number" min="1" name="min[]" class="form-control" value=''></td>
                                                        <td><input type="number" min="1" name="max[]" class="form-control" value=''></td>
                                                        <td><input type="number" min="1" name="denivele[]" class="form-control" value=''></td>
                                                        <td><input type="number" min="1" max="9" name="difficulty[]" class="form-control" value=''></td>
                                                        <td><input type="text" name="info[]" class="form-control" value=''></td>
                                                        <td><button title="Supprimer" type="submit" class="btn btn-outline-danger" onclick="deleteRow(this)"><i class="fas fa-trash-alt"></i></button></td>
                                                        
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row footer ">
                                <div class="col-md-12 pr-1 d-flex justify-content-end">
                                    <div id="insert-more" class="btn btn-secondary btn-round" style="margin-right:15px"> Add Row</div>
                                    <button type="submit" class="btn btn-primary btn-round">{{__('Save')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script>
            $("#insert-more").click(function () {
                $("#mytable").each(function () {
                    var tds = '<tr>';
                    jQuery.each($('tr:last td', this), function () {
                        tds += '<td>' + $(this).html() + '</td>';
                    });
                    tds += '</tr>';
                    if ($('tbody', this).length > 0)
                    {
                        $('tbody', this).append(tds);
                    } else
                    {
                        $(this).append(tds);
                    }
                });
            });

            function deleteRow(r)
            {
                var i = r.parentNode.parentNode.rowIndex;
                var tbllenght = $('#mytable tr').length - 1;
                if (tbllenght != 1)
                {
                    document.getElementById('mytable').deleteRow(i);
                }
            }

            function AutoInpute(autoValue, i, name)
            {
                w = i.parentNode.parentNode.rowIndex - 1;
                var x = document.getElementsByName(name);
                x[w].value = autoValue;
            }
        </script>
@endsection
