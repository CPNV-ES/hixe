<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hike;
use App\Models\User;
use storage\framework\sessions;
use App\Http\Requests\MultiHikesPost;
use Redirect;
use Session;

class MultiHikesController extends Controller{
    public function index(Request $msg){
      foreach($msg->request->all() as $message){
        if($message == "Errors"){
          Session::flash('error', "Errors lors de l'ajout des courses");
        }else{
          Session::flash('success', "Toutes vos courses ont été créé");
        }
      }
      $users = User::all();
      return view('multihikes.create')->with(compact('users'));
    }

    public function create(){
      //return view('multihikes.create');
    }

    public function store(MultiHikesPost $request){
      $validatedData = $request->validated();

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
          $hike->beginning_date = $request->input('hikeDate')[$i].' '.$request->input('start')[$i];
          $hike->ending_date = $request->input('hikeDate')[$i].' '.$request->input('finish')[$i];
          $hike->min_num_participants = $request->input('min')[$i];
          $hike->max_num_participants = $request->input('max')[$i];
          $hike->difficulty = $request->input('difficulty')[$i];
          $hike->additional_info = $request->input('info')[$i];
          $hike->drop_in_altitude = $request->input('denivele')[$i];
          $hike->state_id = 1;
          $hike->save();
          $hike->users()->attach($hike->id,[
            'user_id' => $request->input('chef')[$i],
            'role_id'=> 1
          ]);
        }
        //with doesn't working
        return Redirect::route('multiHikes.index', ['msg' => 'Success']);
      }else{
        //with doesn't working
        return Redirect::route('multiHikes.index', ['msg' => 'Errors']);
      }
      
      
      
    }
}
