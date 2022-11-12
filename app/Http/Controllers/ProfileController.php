<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        return view('profile.edit_profile', ['user' => $user]);
    }

    function store(Request $request)
    {

        $data = $request->validate([
            'from' => 'max:22',
        ]);
        if (!empty(User::find(Auth::id())->profile->user_id) && User::find(Auth::id())->profile->user_id == Auth::id()) {
            Profile::where('user_id', Auth::id())->update([
                'age' => $request['age'],
                'from' => $data['from'],
                'sex' => $request['sex'],
                'user_id' => Auth::id(),
            ]);
        } else {
            Profile::create([
                'age' => $request['age'],
                'from' => $data['from'],
                'sex' => $request['sex'],
                'user_id' => Auth::id(),
            ]);
        }
        return url(route('index_profile', Auth::id()));
    }
}
