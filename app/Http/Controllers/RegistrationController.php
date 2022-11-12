<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Spatie\Permission\Traits\HasRoles;

class RegistrationController extends Controller
{

    function create()
    {
        return view('registration.registration_form');
    }

    function store(RegistrationRequest $request)
    {
        $user = User::create([
            'name' => $request->nickname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('user');
        return view('registration.registration_success');

    }

    function delete()
    {


    }
}
