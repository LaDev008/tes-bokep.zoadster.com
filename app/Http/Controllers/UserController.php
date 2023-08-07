<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('role')->get();

        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $roles = Role::all();

        return view('admin.user.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
          'name' => 'required|string|max:255',
          'username' => 'required|string|max:255',
          'password' => 'required|string|min:8|max:32',
          'role_id' => 'required',
        ]);

        User::create($validated);

        Session::flash('status', 'success');
        Session::flash('message', 'Berhasil Membuat User Baru');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
          'name' => 'required|string|max:255',
          'username' => 'required|string|max:255',
          'role_id' => 'required',
        ]);

        $user->update($validated);

        if($request->password) {
          $user->password = Hash::make($request->password);
        }

        Session::flash('status', 'success');
        Session::flash('message', 'Berhasil Mengupdate User ' . $user->name);

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
      Session::flash('message', 'Berhasil menghapus User ' . $user->name);
        $user->delete();

        Session::flash('status', 'warning');

        return redirect(route('users.index'));
    }
}
