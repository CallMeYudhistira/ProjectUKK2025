<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {
        $credentiasls = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $credentiasls['username'])->first();

        if ($user && password_verify($credentiasls['password'], $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect('/beranda');
        } else {
            return back()->with('error', 'Username atau password salah!');
        }
    }

    public function profile(){
        $user = User::find(Auth::user()->id);

        return view('auth.profile', compact('user'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
