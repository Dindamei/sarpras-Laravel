<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.user', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

   
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('user.index')
            ->with('success', 'Pengguna Berhasil Dibuat.');
    }

   
    public function show(User $user)
    {
        $users = User::all();
        return view('user.create', compact('users'));
    }

    public function edit($id_user)
{
    $user = User::findOrFail($id_user);
    return response()->json($user);
}
public function update(Request $request, $id_user)
{
    $user = User::findOrFail($id_user);
    
    $validator = Validator::make($request->all(), [
        'username' => 'required|string|max:255|unique:users,username,' . $user->id_user . ',id_user',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id_user . ',id_user',
        'role' => 'required|string|max:50',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }

    $userData = [
        'username' => $request->username,
        'email' => $request->email,
        'role' => $request->role,
    ];

    // Only update password if provided
    if ($request->filled('password')) {
        $validator = Validator::make($request->all(), [
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $userData['password'] = Hash::make($request->password);
    }

    $user->update($userData);

    return response()->json(['success' => 'Pengguna Berhasil Di Update']);
}

    public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();
    
    return redirect()->route('user.index')
        ->with('success', 'Pengguna Berhasil Dihapus');
}
}