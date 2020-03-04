<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hike;


class MultiHikesController extends Controller
{
    public function index(){
      return view('createMultiHikes');
    }
    public function create(){
        //return view('createMultiHikes');
    }
    public function store(Request $request){
      

      $validatedData = $request->validate([
        'name' => 'required',
        'meetingLocation' => 'required',
        'meetingDate' => 'required',
        'hixeDate' => 'required',
        'start' => 'required',
        'finish' => 'required',
        'difficulty' => 'required',
        'altitude' => 'required'
        //|after_or_equal:start
        //|after:start
      ]);

      $bResult = true;
      foreach($validatedData as $i){
        foreach($i as $x){
          if ($x == ""){
            $bResult = false;
          }
        }
      }

      if($bResult == true){
        for($i = 0; $i < count($request->input('name')); $i++){
          $hike = new Hike();
          $hike->name = $request->input('name')[$i];
          $hike->meeting_location = $request->input('meetingLocation')[$i];
          $hike->meeting_date = $request->input('meetingDate')[$i];
          $hike->beginning_date = $request->input('hixeDate')[$i].' '.$request->input('start')[$i];
          $hike->ending_date = $request->input('hixeDate')[$i].' '.$request->input('finish')[$i];
          $hike->min_num_participants = $request->input('min')[$i];
          $hike->max_num_participants = $request->input('max')[$i];
          $hike->difficulty = $request->input('difficulty')[$i];
          $hike->additional_info = $request->input('info')[$i];
          $hike->drop_in_altitude = $request->input('altitude')[$i];
          $hike->state_id = 1;
          $hike->save();
        }
        //with doesn't working
        return redirect(route('multiHikes.index'))->with('message', 'Vos Hixe ont été créé');
      }else{
        //with doesn't working
        return redirect(route('multiHikes.index'))->with('message', 'Hixes non créé');
      }

    }
}
