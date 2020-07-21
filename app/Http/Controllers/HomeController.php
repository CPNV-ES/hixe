<?php

namespace App\Http\Controllers;

use App\Hike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $hikes = Auth::user()->hikes;
        return view('home')->with(compact('hikes'));
    }
}
