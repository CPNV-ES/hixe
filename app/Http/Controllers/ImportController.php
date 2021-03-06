<?php

namespace App\Http\Controllers;

use App\User;
use App\HikeCSV;
use App\HikeType;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Storage;

class ImportController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin,hike_manager');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = User::all();
        $hike_types = HikeType::all();
        $file = $request->file('csv');

        if (empty($file)){
            $users = User::all();
            return Redirect::route('multiHikes.index')->with('error',"Votre fichier est vide!");
        } 

        $hikes = HikeCSV::loadHike($file);
        if($hikes == false){
            $users = User::all();
            return Redirect::route('multiHikes.index')->with('error',"Votre fichier n'est pas valide!");
        }

        $validatedHikes = HikeCSV::validationMultiHikes($hikes, $users, $hike_types);
        
        $sumError = 0;
        foreach( $validatedHikes as  $validatedHike){
            if($validatedHike->error == true){
                $sumError++;
            }
        }

        return view('hikes.multicreate')->with(compact('users', 'validatedHikes', 'sumError', 'hike_types'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    public function export(){

        $filepath = public_path('exports/')."model.csv";
        
        return response()->download($filepath);
    }
}
