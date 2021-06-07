<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserEdit;
use App\User;
use App\Role;

/**
 * @OA\Info(title="Hixe API", version="0.1.0")
 * 
 */

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('user.index')->with(compact('users', 'roles'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('user.show',compact('user', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEdit $request, $id)
    {
        $user = User::find($id);

        $firstname = $request->input("firstname");
        $lastname = $request->input("lastname");
        $birthday = $request->input("birthday");
        $email = $request->input("email");

        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->birthdate = $birthday;
        $user->email_address = $email;
        $user->save();
        return redirect(route('profile.show',$id))->with("success","Votre profile a été mis à jour !");
    }

    public function updateRole(User $user, Role $role)
    {
        dd($user, $role);

        return view('user.index')->with("success", "Utilisateur sauvegardé !");
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

    /**
     * @OA\Get(
     *  path="/api/users/search",
     *  description="Search users",
     *  @OA\Parameter(
     *      name="q",
     *      in="query",
     *      description="Query to filter by",
     *      required=true,
     *      @OA\Schema(type="string"),
     *  ),
     *  @OA\Response(
     *      response=200,
     *      description="Ok",
     *      @OA\JsonContent(ref="#/components/schemas/User"),
     *  ),
     * )
     */
    public function search(Request $request) {
        $query = $request->query('q');

        $needles = explode(' ', $query);

        $q = User::query();
        
        if ($needles) {
            foreach($needles as $needle) {
                $q = $q->where('firstname', 'like', "%{$needle}%")->orWhere('lastname', 'like', "%{$needle}%");
            }
        } else {
            $q->where('firstname', 'like', "%{$query}%")->orWhere('lastname', 'like', "%{$query}%");
        }
        
        $users = $q->get()->all();

        return response()->json($users);
    }
}
