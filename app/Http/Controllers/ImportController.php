<?php

namespace App\Http\Controllers;

use App\User;
use App\HikeCSV;
use Illuminate\Http\Request;
use App\Http\Requests\MultiHikesPost;
use Session;

class ImportController extends Controller
{
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
    public function store(MultiHikesPost $request)
    {
        $file = $request->file('csv');
        $hikes = HikeCSV::loadHike($file);
        $validated = $hikes->validated();
        
        if (!empty($file)){
            $users = User::all();
            Session::flash('good', "Toutes vos courses contenues dans votre fichier ont été importé!");
            return view('hikes.multicreate')->with(compact('users', 'hikes'));
        } 
        
        if (empty($file)){
            $users = User::all();
            Session::flash('empty', "Votre fichier est vide!");
            return view('hikes.multicreate')->with(compact('users'));
        }
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
}
