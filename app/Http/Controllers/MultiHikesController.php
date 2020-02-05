<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hike;

class MultiHikesController extends Controller
{
    public function store(Request $request){
      for($i = 0; $i < count($request->input('name')); $i++){
        $hike = new Hike();
        $hike->name = $request->input('name')[$i];
        $hike->meeting_location = $request->input('destination')[$i];
        $hike->meeting_date = $request->input('start')[$i];
        $hike->beginning_date = $request->input('start')[$i];
        $hike->ending_date = $request->input('finish')[$i];
        $hike->difficulty = $request->input('difficulty')[$i];
        $hike->drop_in_altitude = $request->input('altitude')[$i];
        $hike->state_id = 1;    
        $hike->save();
      }
      return redirect()->back()->with('success', 'Saved!'); 
    }
}
