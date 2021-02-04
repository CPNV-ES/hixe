<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\State;
use App\Training;
use Illuminate\Http\Request;
use App\Hike;
use App\User;
use App\Role;
use storage\framework\sessions;
use Redirect;
use Session;
use Auth;
use App\Destination;
use App\Http\Requests\HikesPost;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\Facades\DB;

class HikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $msg)
    {
        foreach ($msg->request->all() as $message) {
            switch ($message) {
                case "Success":
                    Session::flash('success', "La course été supprimé");
                    break;
                case "Add":
                    Session::flash('success', "La course été Ajouté");
                    break;
            }
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
        $users = User::all(); // to allow picking a guide
        $hike = new Hike();
        return view('hikes.create')->with(compact('hike', 'equipment', 'trainings', 'destinations','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(HikesPost $request)
    {
        $newHike = new Hike;
        $newHike->name = $request->input('hikeName');
        $newHike->meeting_location = $request->input('meetloc');
        $newHike->meeting_date = date('Y-m-d H:i:s', $request->input('meettime'));
        $newHike->beginning_date = date('Y-m-d H:i:s', $request->input('starttime'));
        $newHike->ending_date = date('Y-m-d H:i:s', $request->input('endtime'));
        $newHike->min_num_participants = $request->input('minp');
        $newHike->max_num_participants = $request->input('maxp');
        $newHike->difficulty = $request->input('difficulty');
        $newHike->additional_info = $request->input('info');
        $newHike->drop_in_altitude = $request->input('elevation');
        $newHike->state_id = 1; // TODO : use slugs
        $newHike->save();
        $selectedequipment = $request->input('equipment') != null ? array_keys($request->input('equipment')) : [];
        $selectedtrainings = $request->input('equipment') != null ? array_keys($request->input('trainings')) : [];
        $newHike->trainings()->attach($selectedtrainings);
        $newHike->equipment()->attach($selectedequipment);
        $newHike->setOneGuide($request->input('guide'));
        return Redirect::route('hikes.index', ['msg' => 'Add']);
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
        $hike = Hike::find($id);
        $users = User::all(); // to allow picking a guide
        return view('hikes.edit')->with(compact('hike', 'trainings', 'equipment','states','users'));
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
        $hike->meeting_date = $request->input('meettime');
        $hike->beginning_date = $request->input('starttime');
        $hike->ending_date = $request->input('endtime');
        $hike->min_num_participants = $request->input('minp');
        $hike->max_num_participants = $request->input('maxp');
        $hike->difficulty = $request->input('difficulty');
        $hike->additional_info = $request->input('info');
        $hike->drop_in_altitude = $request->input('elevation');
        $hike->state_id = $request->input('state');
        $selectedequipment = $request->input('equipment') != null ? array_keys($request->input('equipment')) : [];
        $selectedtrainings = $request->input('equipment') != null ? array_keys($request->input('trainings')) : [];
        $hike->trainings()->attach($selectedtrainings);
        $hike->equipment()->attach($selectedequipment);
        $hike->setOneGuide($request->input('guide'));
        $hike->save();

        return Redirect::route('hikes.show', $id);
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
        return Redirect::route('hikes.index', ['msg' => 'Success']);
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
