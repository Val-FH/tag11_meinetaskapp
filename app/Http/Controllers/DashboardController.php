<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        //welche aufgaben hat der user
        $tasks = $user->tasks()->latest()->get();

        //Task::where('user_id', $user->id)->latest()->get();

        return view('dashboard', ['user' => $user, 'tasks' => $tasks ]);
    }
}