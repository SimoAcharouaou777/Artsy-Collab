<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        return view('admin.users', compact('users'));
    }
    public function banUser(Request $request ,User $user)
    {
        $user->update(['status' => 'banned']);
        return redirect(route('showauth.users'));
    }
}
