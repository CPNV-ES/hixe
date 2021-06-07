<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hike;
use App\HikeType;
use App\User;
use storage\framework\sessions;
use App\Http\Requests\MultiHikesPost;
use Redirect;
use Session;

class MultiHikesController extends Controller
{
    public function index(Request $msg)
    {
        $users = User::all();
        $hike_types = HikeType::all();
        return view('hikes.multicreate')->with(compact('users', 'hike_types'));
    }

    public function store(MultiHikesPost $request)
    {
        $validatedData = $request->validated();
        
        $bResult = true;
        foreach ($validatedData as $i) {
            foreach ($i as $x) {
                if ($x == "") {
                    $bResult = false;
                }
            }
        }

        if ($bResult == true) {
            for ($i = 0; $i < count($request->input('name')); $i++) {
                $hike = new Hike();
                $hike->name = $request->input('name')[$i];
                $hike->meeting_location = $request->input('meetingLocation')[$i];
                $hike->meeting_date = $request->input('meetingDate')[$i];
                $hike->beginning_date = $request->input('hikeDate')[$i] . ' ' . $request->input('start')[$i];
                $hike->ending_date = $request->input('hikeDate')[$i] . ' ' . $request->input('finish')[$i];
                $hike->min_num_participants = $request->input('min')[$i];
                $hike->max_num_participants = $request->input('max')[$i];
                $hike->difficulty = $request->input('difficulty')[$i];
                $hike->additional_info = $request->input('info')[$i];
                $hike->drop_in_altitude = $request->input('denivele')[$i];
                $hike_type = HikeType::find($request->input('hike_type')[$i]);
                $hike->type()->associate($hike_type);
                $hike->state_id = 1;
                $hike->save();
                $hike->users()->attach($hike->id, [
                    'user_id' => $request->input('chef')[$i],
                    'role_id' => 1
                ]);
            }
            //with doesn't working
            return Redirect::route('multiHikes.index')->with('success','Les courses ont correctement été ajoutées !');

        } else {
            //with doesn't working
            return Redirect::route('multiHikes.index')->with('error','Impossible de sauvegarder les courses !');
        }


    }
}
