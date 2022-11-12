<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    function index()
    {
        $user = User::find(Auth::id());
        return view('profile.index_profile', ['user' => $user]);
    }

    function edit()
    {
        $user = User::find(Auth::id());
        return view('profile.edit_profile',['user'=>$user]);
    }
    function store(Request $request)
    {
        $data = $request->validate([
            'age'=>'integer',
            'from'=>'string|max:12',
            'sex'=>'string|max:12',
        ]);
        Profile::create([
            'age' => $data['age'],
            'from'=>$data['from'],
            'sex'=> $data['sex'],
            'user_id'=>Auth::id(),
        ]);

        return url(route('index_profile',Auth::id()));
    }
}
