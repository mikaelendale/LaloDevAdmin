<?php

namespace App\Http\Controllers;

use App\Models\Events;

class EventsController extends Controller
{
    public function index()
    {
        $events = Events::all(); // Fetch all blog posts
        return view('events.index', compact('events'));
    }
    public function eventdetail($id)
    {
        $events = Events::find($id);

        if ($events) {
            return view('events.detail', compact('events'));
        } else {
            return redirect()->route('events.detail')->with('error', 'events not found');
        }

    }
    public function create()
    {
      return view('events.create');

    }
}
