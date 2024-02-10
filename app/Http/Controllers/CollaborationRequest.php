<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CollaborationRequest extends Controller
{
    public function sendRequest($projectId)
    {
        $user = Auth::user();
        $user->projects()->attach($projectId, ['status' => 'pending']);
        return redirect()->back();
    }

    public function showdashboard()
    {
        $user = Auth::user();
        $pendingUsers = $user->projects()->wherePivot('status', 'pending')->get();
         return view('partner.pendingUsers', compact('pendingUsers'));
    }
    
}
