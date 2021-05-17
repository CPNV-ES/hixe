<?php

namespace App\Http\Controllers;

use App\Hike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // This fixes an issue where the Auth::user is not defined when first 
        // launching the app.
        // TODO: Find a better way to fix this
        $hikes = Auth::user() ? Auth::user()->hikes : null;

        return view('hikes.index')->with(compact(['hikes']));
    }
}
