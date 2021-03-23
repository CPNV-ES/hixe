<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hike;
use App\HikeType;
use App\User;
use App\Role;

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
        $hike_types = HikeType::all();
        return view('hikecalendar.index')->with(compact(['hikes', 'hike_types']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($date)
    {
        $from = $date;
        $to = date('Y-m-d', strtotime($date . ' +1 day'));
        $dayHikes = Hike::whereBetween('beginning_date',[$from,$to])->get();
        return view('hikecalendar.show')->with(compact(['dayHikes','date']));
    }
}
