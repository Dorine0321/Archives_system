<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function create()
    {
       return view('auth.login');
    }
    public function loginUser(Request $request)
    {

        $validateUser = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return back();
        }

        $user = User::where('email', $request->email)->first();

        return redirect()->route('admin.home');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        return redirect()->route('auth.login');
    }
}
