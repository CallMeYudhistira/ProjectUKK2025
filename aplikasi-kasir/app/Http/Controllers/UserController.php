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
        return view('users.index', compact('users'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        if (!$keyword) {
            return redirect('/users');
        }
        $users = User::where('name', 'LIKE', '%' . $keyword . '%')->simplePaginate(10);
        return view('users.index', compact('users', 'keyword'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'gender' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'role' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'role' => $request->role,
        ]);

        return redirect('/users')->with('success', 'Tambah Data Berhasil!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'gender' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'role' => 'required',
        ]);

        if ($request->password == '- - - -') {
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'role' => $request->role,
            ]);
        } else {
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'gender' => $request->gender,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'role' => $request->role,
            ]);
        }

        return redirect('/users')->with('success', 'Ubah Data Berhasil!');
    }

    public function delete($id)
    {
        User::find($id)->delete();
        return redirect('/users')->with('success', 'Hapus Data Berhasil!');
    }
}
