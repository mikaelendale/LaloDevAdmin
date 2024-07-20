<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sites;

use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showCommunity()
{
    // Count users with community_join_stat = 'on'
    $count = User::where('community_join_stat', 'on')->count();

    $joined = User::where('community_join_stat', 'on')->get();

    // Count users who joined today
    $today = User::where('community_join_stat', 'on')
        ->whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])
        ->count();

    // Count users who joined this week
    $weeklyCount = User::where('community_join_stat', 'on')
        ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
        ->count();

    // Count users who joined this month
    $monthlyCount = User::where('community_join_stat', 'on')
        ->whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
        ->count();

    // Fetch the community_site_status from the sites table
    $community_stat = Sites::find(1)->community_site_status;

    return view('community.community', compact('count', 'joined', 'today', 'weeklyCount', 'monthlyCount', 'community_stat'));
}

 

    public function index()
    {
        $user = user::all();
        return view('pages.customer', ['user' => $user]);
    }
    // app/Http/Controllers/UserController.php
    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'where' => 'required|string|max:255',
            'phone_no' => 'required|string|max:255',
            'typeofuser' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'where' => $validated['where'],
            'phone_no' => $validated['phone_no'],
            'typeofuser' => $validated['typeofuser'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        return redirect()->route('users.create')->with('success', 'User created successfully.');
    }
}
