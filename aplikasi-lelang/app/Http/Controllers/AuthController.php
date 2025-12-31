<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function profile(){
        $user = User::find(Auth::user()->id);

        return view('auth.profile', compact('user'));
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
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
            return redirect('/admin/beranda');
        } else {
            return back()->with('error', 'Username atau password salah!');
        }
    }

    public function registerProcess(Request $request)
    {
        $user = User::create($request->validate([
            'name' => 'required',
            'username' => 'required|string|unique:users',
            'password' => 'required|min:6',
            'phone_number' => 'required|numeric',
            'role' => 'required',
        ]));

        $user->update([
            'password' => Hash::make($user->password),
        ]);

        return redirect('/login')->with('success', 'Pendaftaran Berhasil!\nAnda Bisa Login Sekarang!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/');
    }
}
