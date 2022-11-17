<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use App\Models\User;
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
        return view('profile.edit_profile', ['user' => $user]);
    }

    function store(ProfileRequest $request)
    {
        if (!empty(User::find(Auth::id())->profile->user_id) && User::find(Auth::id())->profile->user_id == Auth::id()) {
            Profile::where('user_id', Auth::id())->update([
                'age' => $request['age'],
                'from' => $request['from'],
                'sex' => $request['sex'],
                'user_id' => Auth::id(),
            ]);
        } else {
            Profile::create([
                'age' => $request['age'],
                'from' => $request['from'],
                'sex' => $request['sex'],
                'user_id' => Auth::id(),
            ]);
        }
        return response()->json(['route' => url(route('index_profile',Auth::id()))]);
    }

}
