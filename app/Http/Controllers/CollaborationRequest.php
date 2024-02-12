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
        if (!$user->projects()->where('projects.id', $projectId)->exists()) {
            $user->projects()->attach($projectId, ['status' => 'pending']);
            return redirect()->route('project.details',  $projectId)->with('success', 'Collaboration request sent successfully.');
        }
        return redirect()->route('project.details',  $projectId)->with('error', 'You are already associated with this project.');
    }
    public function showdashboard()
    {
        $user = Auth::user();
        $pendingUsers = $user->projects()->wherePivot('status', 'pending')->get();
         return view('partner.pendingUsers', compact('pendingUsers'));
    }
    public function acceptRequest($projectId)
    {
        $user = Auth::user();
        $user->projects()->updateExistingPivot($projectId,['status' => 'accepted']);
        return redirect(route('partner.dashboard'));
    }
    public function showAcceptedUsers()
    {
        $user = Auth::user();
        $acceptedUsers = $user->projects()->wherePivot('status', 'accepted')->get();
        return view('partner.acceptedUsers', compact('acceptedUsers'));
    }
    public function refuseRequest($projectId)
    {
        $user = Auth::user();
        $user->projects()->updateExistingPivot($projectId,['status' => 'refused']);
        return redirect(route('partner.dashboard')); 
    }
    public function showRefusedUsers()
    {
        $user = Auth::user();
        $refusedUsers = $user->projects()->wherePivot('status', 'refused')->get();
        return view('partner.refusedUsers', compact('refusedUsers'));
    }

     
}
