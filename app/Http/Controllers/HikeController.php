<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\Training;
use Illuminate\Http\Request;
use App\Models\Hike;
use App\Models\User;
use App\Models\Role;
use App\Models\Destination;

class HikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        return view('hikes.create', ['hike' => new Hike])->with(compact(['equipment','trainings','destinations']));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
       
        $newHike = new Hike;
        $newHike->name = $request->input('hikeName');
        $newHike->meeting_location = $request->input('locationRdv');
        $newHike->meeting_date = $request->input('dateRdv').' '.$request->input('timeRdv');
        $newHike->beginning_date = $request->input('dateHike').' '.$request->input('startHike');
        $newHike->ending_date = $request->input('dateHike').' '.$request->input('endHike');
        $newHike->min_num_participants = $request->input('minParticipants');
        $newHike->max_num_participants = $request->input('maxParticipants');
        $newHike->difficulty = $request->input('difficulty');
        $newHike->additional_info = $request->input('addInfo');
        $newHike->drop_in_altitude = $request->input('dropAltitude');

        // TO DO : Take the real state_id
        $newHike->state_id = 1;

        $newHike->save();

        foreach($request->trainings as $training) {
            $newHike->trainings()->attach($training);
        }

        foreach($request->equipment as $material) {
            $newHike->equipment()->attach($material);
        }
        $i=0;
        foreach($request->hikestep as $hikestep) {
            $i++;
            $newHike->destinations()->attach($hikestep,['order'=>$i]);
        }

        return redirect()->action("HikeController@index");

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $hike = Hike::find($id);
        // return view('hikes.show')->with(compact(['hike']));
    }

    public function myHixe(){
        $hikes = Hike::all();
        return view('home')->with(compact('hikes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipment = Equipment::all();
        $trainings = Training::all();
        $destinations = Destination::all();
        $hike = Hike::find($id);
        return view('hikes.edit')->with(compact(['hike','trainings','equipment','destinations']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $hike = Hike::find($id);
        $hike->name = $request->input('hikeName');
        $hike->meeting_location = $request->input('locationRdv');
        $hike->meeting_date = $request->input('dateRdv').' '.$request->input('timeRdv');
        $hike->beginning_date = $request->input('dateHike').' '.$request->input('startHike');
        $hike->ending_date = $request->input('dateHike').' '.$request->input('endHike');
        $hike->min_num_participants = $request->input('minParticipants');
        $hike->max_num_participants = $request->input('maxParticipants');
        $hike->difficulty = $request->input('difficulty');
        $hike->additional_info = $request->input('addInfo');
        $hike->drop_in_altitude = $request->input('dropAltitude');

        // TO DO : Take the real state_id
        $hike->state_id = 1;

        $hike->save();

        
        foreach($request->trainings as $training) {
            $hike->trainings()->attach($training);
        }

        foreach($request->equipment as $material) {
            $hike->equipment()->attach($material);
        }
        $i=0;
        foreach($request->hikestep as $hikestep) {
            $i++;
            $hike->destinations()->attach($hikestep,['order'=>$i]);
        }

        

    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
