<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hike;
use App\Models\User;
use App\Models\Role;
use storage\framework\sessions;
use Redirect;
use Session;
use Auth;

class HikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $msg)
    {
        foreach($msg->request->all() as $message){
            if($message != "Errors"){
              Session::flash('success', "La course été supprimer");
            }
          }
        $hikes = Hike::all();
        return view('hikes.index')->with(compact(['hikes']));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)

    {
        return view('hikes.create', ['hike' => new Hike]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $newHike = new Hike();
        $newHike->name = $request->input('hikeName');
        $newHike->meeting_location = $request->input('locationRdv');
        $newHike->meeting_date = $request->input('dateRdv').' '.$request->input('timeRdv');
        $newHike->beginning_date = $request->input('dateHike').' '.$request->input('startHike');
        $newHike->ending_date = $request->input('dateHike').' '.$request->input('endHike');
        $newHike->min_num_participants = $request->input('minParticipants');
        $newHike->max_num_participants = $request->input('maxParticipants');
        $newHike->difficulty = 1;
        $newHike->additional_info = $request->input('addInfo');
        $newHike->drop_in_altitude = $request->input('dropAltitude');

        // TO DO : Take the real state_id
        $newHike->state_id = 1;

        $newHike->save();

        return redirect()->action("HikeController@index");

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $hike = Hike::find($id);
        return view('hikes.show')->with(compact('hike'));
    }

    public function myHike(){
        /*
        Pas utilisé parce qu'avec cette requette il ne resort pas le guides et les destinations
        */
        /*
        $hikes = Hike::where('email_address', Auth::user()->email_address)
        ->join('hike_user', 'hike_user.hike_id', '=', 'hikes.id')
        ->join('users', 'hike_user.user_id', '=', 'users.id')
        ->select('*')->get();
        */
        $hikes = Hike::all();
        return view('home')->with(compact('hikes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd("Edit : ".$id);
        $hike = Hike::find($id);
        return view('hikes.edit')->with(compact(['hike']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hike = Hike::find($id);
        
        $hike->users()->detach();
        $hike->equipment()->detach();
        $hike->trainings()->detach();
        $hike->destinations()->detach();
        $hike->delete();
        return Redirect::route('hikes.index', ['msg' => 'Success']);
    }
}
