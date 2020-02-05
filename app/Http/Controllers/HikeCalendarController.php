<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hike;
use App\Models\User;
use App\Models\Role;

class HikeCalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hikes=Hike::all();
        return view('calendar')->with(compact(['hikes']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($date)
    {
        $dayHikes = Hike::where('meeting_date','=',$date)->get();
        return view('day_calendar')->with(compact(['dayHikes']));
    }
}
