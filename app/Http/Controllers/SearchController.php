<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request) {
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
