<?php

namespace App\Http\Controllers;

use App\Hike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->query("q");
        $hikes = Hike::query();

        // This fixes an issue where the Auth::user is not defined when first 
        // launching the app.
        // TODO: Find a better way to fix this
        if (isset($query)) {
            $hikes = $hikes->withParticipants($query);
        }

        $hikes = $hikes->get();

        return view('hikes.index')->with(compact(['hikes', 'query']));
    }
}
