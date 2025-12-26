<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $users = User::query();
        if ($keyword) {
            $users->where('name', 'like', "%$keyword%");
        }
        $users = $users->simplePaginate(10);

        return view('pages.users.index', compact('users', 'keyword'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,petugas',
        ]);

        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return redirect()->back()->with('success', 'User berhasil ditambahkan.');
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'password' => 'nullable|string|min:8',
            'role' => 'required|in:admin,petugas',
        ]);

        if ($request->password) {
            $data['password'] = bcrypt($data['password']);
        } else {
            $data['password'] = $user->password;
        }

        $user->update($data);

        return redirect()->back()->with('success', 'User berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect()->back()->with('success', 'User berhasil dihapus.');
    }
}
