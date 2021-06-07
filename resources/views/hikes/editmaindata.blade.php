@push('scripts')
    <script src="{{ asset('/js/hikes-editmaindata.js') }}"></script>
@endpush
<script src="/lib/moment/moment.min.js"></script>
<script src="/lib/eonasdan-bootstrap-datetimepicker/bootstrap-datetimepicker.min.js"></script>

<link rel="stylesheet" href="/lib/eonasdan-bootstrap-datetimepicker/bootstrap-datetimepicker.min.css">
<style>
    @font-face { 
        font-family: "Glyphicons Halflings"; 
        src: url("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/fonts/glyphicons-halflings-regular.woff") format("woff"), 
    }
</style>

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
                    <option value="{{$user->id}}" {{ $user->id == ($guide_id ?? null) ? 'selected' : ''}}>{{$user->firstname}} {{$user->lastname}}</option>
                @endforeach
            </select>
        </div>
        @if (isset($hike_types))
            <div class="form-row">
                <label for="hike_type" class="form-control bg-transparent col-2 border-0 text-right">Type de course</label>
                <select id="hike_type" class="form-control col-4" name="hike_type">
                    @foreach($hike_types as $type)
                        <option value="{{$type->id}}"  {{ $hike->type ? ($hike->type->id == $type->id ? 'selected' : '') : '' }}>{{$type->name}}</option>
                    @endforeach
                </select>
            </div>
        @endif
        <div class="form-row">
            <label class="form-control bg-transparent col-2 border-0 text-right">Rendez-vous</label>
            <input type="text" name="meetloc" class="form-control col-3" value="{{ $hike->meeting_location }}">
            <label class="form-control bg-transparent col-2 border-0 text-right">le</label>
            <div class='input-group mb-3 date col-3 datetimepicker' data-input="#meettime">
                <input type='text' class="form-control" />
                <input type="number" name="meettime" id="meettime" hidden value="{{ strtotime($hike->meeting_date) }}"/>
                <div class="input-group-append input-group-addon">
                    <span class="input-group-text far fa-calendar-alt fa-1x p-2"></span>
                </div>
             </div>
        </div>
        <div class="form-row">
            <label class="form-control bg-transparent col-2 border-0 text-right">Départ</label>
            <div class='input-group mb-3 date col-3 datetimepicker' data-input="#starttime">
                <input type='text' class="form-control" />
                <input type="number" name="starttime" id="starttime" value="{{ strtotime($hike->beginning_date) }}" hidden />
                <div class="input-group-append input-group-addon">
                    <span class="input-group-text far fa-calendar-alt fa-1x p-2"></span>
                </div>
             </div>
             <label class="form-control bg-transparent col-2 border-0 text-right">Retour prévu</label>
             <div class='input-group mb-3 date col-3 datetimepicker' data-input="#endtime">
                <input type='text' class="form-control" />
                <input type="number" name="endtime" id="endtime" value="{{ strtotime($hike->ending_date) }}" hidden />
                <div class="input-group-append input-group-addon">
                    <span class="input-group-text far fa-calendar-alt fa-1x p-2"></span>
                </div>
             </div>
        </div>
        <div class="form-row">
            <label class="form-control bg-transparent col-2 border-0 text-right">Dénivelé</label>
            <input type="number" min="1" name="elevation" class="form-control col-1" value="{{ $hike->drop_in_altitude }}">
            <label class="form-control bg-transparent col-2 border-0 text-right">Difficulté technique</label>
            <input type="number" min="1" max="9" name="difficulty" class="form-control col-1" value="{{ $hike->difficulty }}">
        </div>
        <div class="form-row">
            <label class="form-control bg-transparent col-2 border-0 text-right">Participants: minimum </label>
            <input type="number" name="minp" min="1" class="form-control col-1" value="{{ $hike->min_num_participants }}">
            <label class="form-control bg-transparent col-1 border-0 text-right"> maximum </label>
            <input type="number" name="maxp" min="1" class="form-control col-1" value="{{ $hike->max_num_participants }}">
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
                        <input type="checkbox" class="form-control col-1" name="trainings[{{ $training->id }}]" {{ array_search($training->id, $trainingsArray ?? []) !== false || $hike->trainingIsRequired($training) ? 'checked' : '' }}><label class="form-control col-10 text-left bg-transparent border-0">{{ $training->description }}</label>
                    </div>
                @endforeach
            </div>
            <div class="col-6">
                <label class="form-control bg-transparent border-0 text-left">Matériel requis</label>
                @foreach($equipment as $eqp)
                    <div class="row">
                        <input type="checkbox" class="form-control col-1" name="equipment[{{ $eqp->id }}]" {{  array_search($eqp->id, $equipmentsArray ?? []) !== false || $hike->equipmentIsRequired($eqp) ? 'checked' : '' }}><label class="form-control col-10 text-left bg-transparent border-0">{{ $eqp->name }}</label>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    let msg = "Vous êtes sur le point de partir vous aller perdre vos modifications"
    let nameInput = document.querySelector('input[name="hikeName"]')
    let form = document.querySelector('#hike_form')
    let formInputs = document.querySelectorAll('#hike_form input')
    
    let formChangeFlag = false

    formInputs.forEach((input)=> {
        input.addEventListener('change', ()=> {
            formChangeFlag = true
            console.log('change')
        })
    })

    window.onbeforeunload = () => {
        if(formChangeFlag === true){
            return msg
        }
        return;
    }
    form.addEventListener('submit',(e) => {
        window.onbeforeunload = null
        return true
    })
</script>
