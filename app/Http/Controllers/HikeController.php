<?php

namespace App\Http\Controllers;

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
    public function create()
    {
        return view('create_hike');
    }
    public function show($id){
        $hike = Hike::find($id);
        return view('profile')->with(compact(['hike']));
    }

}
