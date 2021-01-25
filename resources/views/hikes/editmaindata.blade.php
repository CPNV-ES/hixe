@push('scripts')
    <script src="{{ asset('/js/hikes-editmaindata.js') }}"></script>
@endpush

<script src="/lib/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

<link rel="stylesheet" href="/lib/bootstrap-datepicker/bootstrap-datepicker.min.css">

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
            <label class="form-control bg-transparent col-2 border-0 text-right">Guide</label>
            <select class="form-control col-4" name="guide">
                @foreach($users as $user)
                    <option value="{{$user->id}}">{{$user->firstname}} {{$user->lastname}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-row">
            <label class="form-control bg-transparent col-2 border-0 text-right">Rendez-vous à </label>
            {{-- <input type="text" name="meetloc" class="form-control col-4" value="{{ $hike->meeting_location }}"> --}}
            <div class='input-group date' id='datetimepicker3'>
                <input type='text' class="form-control" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
             </div>
            <label class="form-control bg-transparent col-1 border-0 text-right"> le </label>
            <input type="date" name="meettime" class="form-control col-3" value="{{ $hike->meeting_date ? \Carbon\Carbon::parse($hike->meeting_date)->format('Y-m-d\TH:i') : '' }}">
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
            <div class="col-6">
                <label class="form-control bg-transparent border-0 text-left">Cours requis</label>
                @foreach($trainings as $training)
                    <div class="row">
                        <input type="checkbox" class="form-control col-1" name="trainings[{{ $training->id }}]" {{ $hike->trainingIsRequired($training) ? 'checked' : '' }}><label class="form-control col-10 text-left bg-transparent border-0">{{ $training->description }}</label>
                    </div>
                @endforeach
            </div>
            <div class="col-6">
                <label class="form-control bg-transparent border-0 text-left">Matériel requis</label>
                @foreach($equipment as $eqp)
                    <div class="row">
                        <input type="checkbox" class="form-control col-1" name="equipment[{{ $eqp->id }}]" {{ $hike->equipmentIsRequired($eqp) ? 'checked' : '' }}><label class="form-control col-10 text-left bg-transparent border-0">{{ $eqp->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
