<?php

namespace App\Http\Controllers;

use App\Models\Landing;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $landing = Landing::find(1); // Fetch all user pages
        return view('landing.index', compact('landing'));
    } 
}
