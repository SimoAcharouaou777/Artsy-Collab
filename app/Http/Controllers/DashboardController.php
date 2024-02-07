<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.projects');
    }
    public function showUsers()
    {
        return view('admin.users');
    }

}
