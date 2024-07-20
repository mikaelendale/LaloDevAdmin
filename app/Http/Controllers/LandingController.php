<?php

namespace App\Http\Controllers;

use App\Models\Landing;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $userpages = Landing::find(1); // Fetch all user pages
        return view('userpage.userpage', compact('userpages'));
    }
    public function edit($id)
    {
        $userpage = Landing::find($id);

        if (!$userpage) {
            return redirect()->route('userpages')->with('error', 'Userpage not found.');
        }

        return view('userpage.edit', compact('userpage'));
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
        $userpage = Landing::find($id);

        if (!$userpage) {
            return redirect()->route('userpages')->with('error', 'User Page not found.');
        }

        // Update the Userpage with validated data
        $userpage->update($validated);

        // Redirect with success message
        return redirect()->route('userpages')->with('success', 'User Page updated successfully.');
    }
}
