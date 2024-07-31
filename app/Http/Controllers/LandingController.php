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
    public function config($id)
    {
        $landing = Landing::find($id);

        if (!$landing) {
            return redirect()->route('landing')->with('error', 'landing not found.');
        }

        return view('landing.config', compact('landing'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $validated = $request->validate([
            'info' => 'nullable|string|max:255',
            'page_status' => 'nullable|string|max:255',
            'reason' => $request->page_status === 'on' ? 'nullable|string|max:255' : 'required|string|max:255',
            'description' => $request->page_status === 'on' ? 'nullable|string|max:255' : 'required|string|max:255',
        ]);

        // Find the Userpage by id
        $landing = Landing::find($id);

        if (!$landing) {
            return redirect()->route('landing')->with('error', 'landing not found.');
        }

        // Update the Userpage with validated data
        $landing->update($validated);

        // Redirect with success message
        return redirect()->route('landing')->with('success', 'landing updated successfully.');
    }
}
