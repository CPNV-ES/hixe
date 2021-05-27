<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\State;
use App\Training;
use Illuminate\Http\Request;
use App\Hike;
use App\User;
use App\Destination;
use App\HikeType;
use App\Http\Requests\HikesPost;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (\Str::contains($request->header('Accept'), 'application/json')) {
            $start_date = $request->query('start_date');
            $end_date = $request->query('end_date');
            $difficulty = $request->query('difficulty');
            $type = $request->query('type');

            $hikes = Hike::between($start_date, $end_date);

            if ($type != 'all') {
                $hikes =  $hikes->where('type_id', $type);
            }

            if ($difficulty != 'all') {
                $hikes = $hikes->where('difficulty', $difficulty);
            }

            return response()->json($hikes->get());
        }

        $hikes = Hike::all();
        return view('hikes.index')->with(compact(['hikes']));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $equipment = Equipment::all();
        $trainings = Training::all();
        $destinations = Destination::all();
        $hike_types = HikeType::all();
        $users = User::all(); // to allow picking a guide

        $hike_src = Hike::find($request->query('id'));
        $hike = $hike_src->replicate();
        $guide_id = $hike_src->guides->first()->id ?? null;

        $trainingsArray = $hike_src->trainings->pluck('id')->toArray();
        $equipmentsArray = $hike_src->equipment->toArray();

        return view('hikes.create')->with(compact('hike','equipment', 'trainings', 'destinations', 'users', 'hike_types','guide_id','trainingsArray','equipmentsArray'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(HikesPost $request)
    {
        $hike = new Hike;
        $hike->name = $request->input('hikeName');
        $hike->meeting_location = $request->input('meetloc');
        $hike->meeting_date = date('Y-m-d H:i:s', $request->input('meettime'));
        $hike->beginning_date = date('Y-m-d H:i:s', $request->input('starttime'));
        $hike->ending_date = date('Y-m-d H:i:s', $request->input('endtime'));
        $hike->min_num_participants = $request->input('minp');
        $hike->max_num_participants = $request->input('maxp');
        $hike->difficulty = $request->input('difficulty');
        $hike->additional_info = $request->input('info');
        $hike->drop_in_altitude = $request->input('elevation');

        $hike_type = HikeType::find($request->input('hike_type'));
        $hike->type()->associate($hike_type);

        $hike->state_id = 1; // TODO : use slugs
        $hike->save();
        $selectedequipment = $request->input('equipment') != null ? array_keys($request->input('equipment')) : [];
        $selectedtrainings = $request->input('equipment') != null ? array_keys($request->input('trainings')) : [];
        $hike->trainings()->attach($selectedtrainings);
        $hike->equipment()->attach($selectedequipment);
        $hike->setOneGuide($request->input('guide'));

        return Redirect::route('hikes.index')->with('success','La course a été ajoutée');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hike = Hike::find($id);
        return view('hikes.show')->with(compact('hike'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipment = Equipment::all();
        $trainings = Training::all();
        $states = State::all();
        $hike_types = HikeType::all();
        $hike = Hike::find($id);
        $users = User::all(); // to allow picking a guide
        return view('hikes.edit')->with(compact('hike', 'trainings', 'equipment', 'states', 'users', 'hike_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(HikesPost $request, $id)
    {
        $hike = Hike::find($id);
        $hike->equipment()->detach();
        $hike->trainings()->detach();
        $hike->name = $request->input('hikeName');
        $hike->meeting_location = $request->input('meetloc');
        $hike->meeting_date = date('Y-m-d H:i:s', $request->input('meettime'));
        $hike->beginning_date = date('Y-m-d H:i:s', $request->input('starttime'));
        $hike->ending_date = date('Y-m-d H:i:s', $request->input('endtime'));
        $hike->min_num_participants = $request->input('minp');
        $hike->max_num_participants = $request->input('maxp');
        $hike->difficulty = $request->input('difficulty');
        $hike->additional_info = $request->input('info');
        $hike->drop_in_altitude = $request->input('elevation');

        $hike_type = HikeType::find($request->input('hike_type'));
        $hike->type()->associate($hike_type);

        $hike->state_id = $request->input('state');
        $selectedequipment = $request->input('equipment') != null ? array_keys($request->input('equipment')) : [];
        $selectedtrainings = $request->input('equipment') != null ? array_keys($request->input('trainings')) : [];
        $hike->trainings()->attach($selectedtrainings);
        $hike->equipment()->attach($selectedequipment);
        $hike->setOneGuide($request->input('guide'));
        $hike->save();

        return Redirect::route('hikes.show', $id)->with('success','La course a correctement été modifiée');;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hike = Hike::find($id);

        $hike->users()->detach();
        $hike->equipment()->detach();
        $hike->trainings()->detach();
        $hike->delete();

        return Redirect::route('hikes.index')->with('warning','Hike supprimée !');
    }

    public function registerToHike($hike_id)
    {
        $hike = Hike::find($hike_id);

        $hike->users()->attach(Auth::user()->id, ['role_id' => 3]);

        $hikes = Hike::all();
        return view('hikes.index')->with(compact('hikes'));
    }

    /**
     * Receive AJAX request from addSearchAutocomplete function in hixe-form.js
     * @param Request $request
     */
    function fetch(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $data = DB::table('destinations')
                ->where('location', 'LIKE', "%{$query}%") // location is the column name
                ->get();
            $output = '<div id="destinationList"><ul class="dropdown-menu" style="display:block; position:relative">';
            foreach ($data as $row) {
                $output .= '<li>' . $row->location . '</li>';
            }
            $output .= '</ul></div>';
            echo $output;
        }
    }
}
