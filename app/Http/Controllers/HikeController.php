<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Training;
use Illuminate\Http\Request;
use App\Models\Hike;
use App\Models\User;
use App\Models\Role;

class HikeController extends Controller
{
    public function index()
    {
        $hikes = Hike::all();
        return view('all_hikes')->with(compact(['hikes']));
    }
    public function create(Request $request)
    {
        return view('create_hike');
    }

    public function store(Request $request){
        $newHike = new Hike;
        $newHike->name = $request->input('hikeName');
        $newHike->meeting_location = $request->input('locationRdv');
        $newHike->meeting_date = $request->input('dateRdv').' '.$request->input('timeRdv');
        $newHike->beginning_date = $request->input('dateHike').' '.$request->input('startHike');
        $newHike->ending_date = $request->input('dateHike').' '.$request->input('endHike');
        $newHike->min_num_participants = $request->input('minParticipants');
        $newHike->max_num_participants = $request->input('maxParticipants');
        $newHike->difficulty = 1;
        $newHike->additional_info = $request->input('addInfo');
        $newHike->drop_in_altitude = $request->input('dropAltitude');

        // TO DO : Take the real state_id
        $newHike->state_id = 1;

        $newEquipment = new Equipment;
        $newEquipment->name = $request->input('material');

        $newCourse = new Training;
        $newCourse->certificate_number = $request->input('numcours');
        $newCourse->description = $request->input('cours');

        $newCourse->save();
        $newEquipment->save();
        $newHike->save();

        $newHike->equipment()->attach($newEquipment->id);
        $newHike->training()->attach($newCourse->id);

        return redirect()->action("HikeController@index");

    }

    public function show($id){
        $hike = Hike::find($id);
        return view('create_hike')->with(compact(['hike']));
    }

}
