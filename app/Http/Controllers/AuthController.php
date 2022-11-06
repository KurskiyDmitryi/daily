<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function login_form()
    {
        return view('auth.login_form');
    }

    function auth(Request $request)
    {
        $data = $request->validate([
            "email" => ["required", "email", "string"],
            "password" => ["required"]
        ]);

        if (auth("web")->attempt($data)) {
            return url(route('home'));

        }
        return 'error';
    }
        function logout()
        {
            auth('web')->logout();
            return redirect(route('home'));
        }


}
