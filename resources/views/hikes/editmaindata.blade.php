<div class="container mt-4 table-responsive text-center">
    <div class="jumbotron pt-2 pb-2">
        <div class="form-row">
            <label class="form-control bg-transparent col-2 border-0 text-right">Nom</label>
            <input type="text" name="hikeName" class="form-control col-6" value="{{ $hike->name }}">
        </div>
        @if (isset($states))
        <div class="form-row">
            <label class="form-control bg-transparent col-2 border-0 text-right">Etat</label>
            <select name="state" class="form-control col-2">
                @foreach($states as $state)
                    <option value="{{$state->id}}" {{ $hike->state ? ($hike->state->id == $state->id ? 'selected' : '') : '' }}>{{ $state->name }}</option>
                @endforeach
            </select>
        </div>
        @endif
        <div class="form-row">
            <label class="form-control bg-transparent col-2 border-0 text-right">Rendez-vous à </label>
            <input type="text" name="meetloc" class="form-control col-4" value="{{ $hike->meeting_location }}">
            <label class="form-control bg-transparent col-1 border-0 text-right"> le </label>
            <input type="datetime-local" name="meettime" class="form-control col-3" value="{{ $hike->meeting_date ? \Carbon\Carbon::parse($hike->meeting_date)->format('Y-m-d\TH:i') : '' }}">
        </div>
        <div class="form-row">
            <label class="form-control bg-transparent col-2 border-0 text-right">Départ</label>
            <input type="datetime-local" name="starttime" class="form-control col-3" value="{{ $hike->beginning_date ? \Carbon\Carbon::parse($hike->beginning_date)->format('Y-m-d\TH:i') : '' }}">
            <label class="form-control bg-transparent col-2 border-0 text-right">Retour prévu</label>
            <input type="datetime-local" name="endtime" class="form-control col-3" value="{{ $hike->ending_date ? \Carbon\Carbon::parse($hike->ending_date)->format('Y-m-d\TH:i') : '' }}">
        </div>
        <div class="form-row">
            <label class="form-control bg-transparent col-2 border-0 text-right">Dénivelé</label>
            <input type="number" name="elevation" class="form-control col-1" value="{{ $hike->drop_in_altitude }}">
            <label class="form-control bg-transparent col-2 border-0 text-right">Difficulté technique</label>
            <input type="number" name="difficulty" class="form-control col-1" value="{{ $hike->difficulty }}">
        </div>
        <div class="form-row">
            <label class="form-control bg-transparent col-2 border-0 text-right">Participants: minimum </label>
            <input type="number" name="minp" class="form-control col-1" value="{{ $hike->min_num_participants }}">
            <label class="form-control bg-transparent col-1 border-0 text-right"> maximum </label>
            <input type="number" name="maxp" class="form-control col-1" value="{{ $hike->max_num_participants }}">
        </div>
        <div class="form-row">
            <label class="form-control bg-transparent border-0 text-center">Divers</label>
            <textarea class="form-control" name="info">{{ $hike->additional_info }}</textarea>
        </div>
        <div class="form-row">
            <label class="form-control bg-transparent border-0 text-center">Cours requis</label>
            <select multiple name="trainings[]">
                @foreach($trainings as $training)
                    <option value="{{ $training->id }}" {{ $hike->trainingIsRequired($training) ? 'selected' : '' }}>{{ $training->description }}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
