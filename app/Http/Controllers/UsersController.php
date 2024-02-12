<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        $roles = Role::all();
        return view('admin.users', compact('users','roles'));
    }
    public function banUser(Request $request ,User $user)
    {
        $user->update(['status' => 'banned']);
        return redirect(route('showauth.users'));
    }
    public function deleteUser(Request $request,$userId)
    {
        User::find($userId)->delete();
        return redirect(route('showauth.users'));
    }
    public function UpdateUserRole(Request $request,$userId)
    {
        $user = User::find($userId);
        $request->validate([
            'role' => 'required|in:admin,partner,user',
        ]);
        $roleName = $request->input('role');
        $role = Role::where('name', $roleName)->first(); 
        $user->roles()->sync([$role->id]);
        return redirect(route('showauth.users'));
    }
}
