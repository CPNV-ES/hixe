<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hike;
use App\Models\User;
use App\Models\Role;

class HikeController extends Controller
{
    public function listAllHikes()
    {
      $hikes = Hike::all();
        
      return view('all_hikes')->with(compact(['hikes']));
    }
}