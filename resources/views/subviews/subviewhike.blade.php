
<div class="form-row">
    <div class="form-group col-md-3">
        <label>Nom du Hike</label>
        <input type="text" name="hikeName" class="form-control" value="{{$hike->name ?? ''}}">
    </div>
</div>
<div class="form-row">
    <div class="form-group col-md-2">
        <label>Rendez-vous</label>
    <input type="date" name="dateRdv" class="form-control" value="{{ $hike->meeting_date ? Carbon\Carbon::parse($hike->meeting_date)->format('Y-m-d') : '' }}">
    </div>
    <div class="form-group col-md-2">
        <label>Heure</label>
    <input type="time" name="timeRdv" class="form-control" value="{{ $hike->meeting_date ? Carbon\Carbon::parse($hike->meeting_date)->format('h:i') : '' }}">
    </div>
    <div class="form-group col-md-3">
        <label>Lieu du rdv</label>
    <input type="text" name="locationRdv" class="form-control" value="{{ $hike->meeting_location ?? '' }}">
    </div>
    <div class="form-group offset-1 col-md-4">
        <table class="table" id="tableTraining">
            <thead>
                <th>Cours requis & Numéro</th>
                <th></th>
            </thead>
            <tbody>
                @if($hike->exists)
                    @foreach ($hike->trainings as $hiketraining)
                    <tr>
                        <td>
                            <select name="trainings[]" type="button" class="form-control no-new-entry">
                                @foreach($trainings as $training)
                                    <option
                                    @if($hiketraining->description == $training->description)
                                        selected
                                    @endif
                            value="{{$training->id}}">{{ $training->description }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary" name="remove-cours">
                                    X
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>
                            <select name="trainings[]" type="button" class="form-control">
                                <option disabled selected><< Sélectionner un cours >></option>
                                @foreach($trainings as $training)
                                    <option value="{{$training->id}}">{{ $training->description }}>{{$training->description}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary" name="remove-cours" hidden>
                                    X
                                </button>
                            </div>
                        </td>
                    </tr>
                @endif
                @if(!$hike->exists)
                <tr>
                    <td>
                        <select name="trainings[]" type="button" class="form-control">
                            <option disabled selected><< Sélectionner un cours >></option>
                            @foreach($trainings as $training)
                                <option value="{{$training->id}}">{{$training->description}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" name="remove-cours" hidden>
                                X
                            </button>
                        </div>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-2">
        <label>Date de la course</label>
    <input type="date" name="dateHike" class="form-control" value="{{ $hike->beginning_date ? Carbon\Carbon::parse($hike->beginning_date)->format('Y-m-d') : '' }}">
    </div>
    <div class="form-group col-md-2">
        <label>Départ</label>
        <input type="time" name="startHike" class="form-control" value="{{ $hike->ending_date ? Carbon\Carbon::parse($hike->ending_date)->format('h:i') : '' }}">
    </div>
    <div class="form-group col-md-2">
        <label>Retour</label>
        <input type="time" name="endHike" class="form-control" value="{{ $hike->ending_date ? Carbon\Carbon::parse($hike->ending_date)->format('h:i') : '' }}">
    </div>
    <div class="form-group offset-2 col-md-4">
        <table class="table" id="tableMaterial">
            <thead>
                <th>Matériel requis</th>
                <th></th>
            </thead>
            <tbody>
            @if($hike->exists)
                    @foreach ($hike->equipment as $hikeitem)
                    <tr>
                        <td>
                            <select name="equipment[]" type="button" class="form-control no-new-entry">
                                @foreach($equipment as $item)
                                <option
                                @if($item->name == $hikeitem->name)
                                selected
                                @endif
                            value="{{$item->id}}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary" name="remove-material">
                                    X
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>
                            <select name="equipment[]" type="button" class="form-control">
                                <option disabled selected><< Sélectionner un matériel >></option>
                                @foreach($equipment as $item)
                                <option value="{{$item->id}}">{{ $item->name }}>{{$item->name}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary" name="remove-material" hidden>
                                    X
                                </button>
                            </div>
                        </td>
                    </tr>
                @endif
                @if(!$hike->exists)
                <tr>
                    <td>
                        <select name="equipment[]" type="button" class="form-control">
                            <option disabled selected><< Sélectionner un matériel >></option>
                            @foreach($equipment as $item)

                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" name="remove-material" hidden>
                                X
                            </button>
                        </div>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>

    </div>
</div>

<div class="form-row">

    <div class="form-group col-md-4">

        <table class="table">
            <thead>
                <th>Destination & Étapes</th>
                <th></th>
            </thead>
                <tbody>

                @if($hike->exists)
                @foreach ($hike->destinations as $waypoint)
                <tr>
                    <td>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-map-marker-alt"> </i>
                                </div>
                            </div>

                            <select name="hikestep[]" type="button" class="form-control">
                            @foreach($destinations as $destination)

                                <option

                                @if($waypoint->location == $destination->location)
                                    selected
                                @endif
                                value="{{ $destination->id }}"
                                >

                                {{ $destination->location }}
                                </option>
                            @endforeach
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" name="remove-material">
                                X
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
                @endif
                @if(!$hike->exists)

                <tr>
                    <td>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-map-marker-alt"> </i>
                                </div>
                            </div>

                            <!-- <select name="hikestep[]" type="button" class="form-control">
                                <option disabled selected><< Sélectionner une destination >></option>
                            @foreach($destinations as $destination)
                                <option value="{{ $destination->id }}">{{ $destination->location }}</option>
                            @endforeach
                            </select> -->

                            <input type="text" name="hikestep[]" class="form-control destination-input" placeholder="Destination" data-url="{{ route('autocomplete.fetch') }}"/>

                            {{ csrf_field() }}
                        </div>
                        <!-- Autocomplete location goes here -->

                    </td>
                    <td>
                        <div class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" name="remove-material" hidden>
                                X
                            </button>
                        </div>
                    </td>
                </tr>

                @endif
                <tr id="destination">

                </tr>
            </tbody>
        </table>
        <input type="button" value="Ajouter une étape" class="btn btn-secondary" id="addRowStep"/>
    </div>
    <div class="form-group offset-4 col-md-4">
        <label>Informations additionnelles</label>
        <textarea name="addInfo" class="form-control">{{ $hike->additional_info }}</textarea>
    </div>
</div>

<div class="form-row">
    <div class="form-group col-md-2">
        <label>Dénivelé</label>
        <div class="input-group">
        <input name="dropAltitude" min="1" type="number" class="form-control" value="{{ $hike->drop_in_altitude ?? '' }}">
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
            <input type="number" name="minParticipants" min="1" class="form-control" value="{{$hike->min_num_participants ?? ''}}">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    min
                </div>
            </div>
        </div>
        <div class="input-group">
            <input type="number" name="maxParticipants" class="form-control" value="{{$hike->max_num_participants ?? ''}}">
            <div class="input-group-prepend">
                <div class="input-group-text">
                    max
                </div>
            </div>
        </div>
    </div>

</div>


