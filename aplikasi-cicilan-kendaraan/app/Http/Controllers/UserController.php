<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::simplePaginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        if (!$keyword) {
            return redirect('/admin/users');
        }
        $users = User::where('name', 'LIKE', '%' . $keyword . '%')->simplePaginate(10);
        return view('admin.users.index', compact('users', 'keyword'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect('/admin/users')->with('success', 'Tambah Data Berhasil!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        $user = User::find($id);
        $checkEmail = User::where('email', $request->email)->first();

        if($checkEmail && $request->email == $checkEmail->email && $id != $checkEmail->id){
            return redirect('/admin/users')->with('error', 'The email has already been taken.');
        }

        if ($request->password == '- - - -') {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
            ]);
        } else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
        }

        return redirect('/admin/users')->with('success', 'Ubah Data Berhasil!');
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return redirect('/admin/users')->with('success', 'Hapus Data Berhasil!');
    }
}
