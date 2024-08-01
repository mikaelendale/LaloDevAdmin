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
    // Define validation rules for the fields in the landing table
    $validated = $request->validate([
        'status' => 'nullable|string|max:255',
        'home' => 'nullable|string|max:255',
        'home_link' => 'nullable|string|max:255',
        'about' => 'nullable|string|max:255',
        'about_link' => 'nullable|string|max:255',
        'service' => 'nullable|string|max:255',
        'service_link' => 'nullable|string|max:255',
        'quote' => 'nullable|string|max:255',
        'quote_link' => 'nullable|string|max:255',
        'blog' => 'nullable|string|max:255',
        'blog_link' => 'nullable|string|max:255',
        'faq' => 'nullable|string|max:255',
        'faq_link' => 'nullable|string|max:255',
        'login' => 'nullable|string|max:255',
        'register' => 'nullable|string|max:255',
        'about_section' => 'nullable|string|max:255',
        'explore_section' => 'nullable|string|max:255',
        'cta_section' => 'nullable|string|max:255',
        'footer' => 'nullable|string|max:255',
        'service_footer' => 'nullable|string|max:255',
        'service_1' => 'nullable|string|max:255',
        'service_1_link' => 'nullable|string|max:255',
        'service_2' => 'nullable|string|max:255',
        'service_2_link' => 'nullable|string|max:255',
        'service_3' => 'nullable|string|max:255',
        'service_3_link' => 'nullable|string|max:255',
        'service_4' => 'nullable|string|max:255',
        'service_4_link' => 'nullable|string|max:255',
        'service_5' => 'nullable|string|max:255',
        'service_5_link' => 'nullable|string|max:255',
        'company_footer' => 'nullable|string|max:255',
        'company_1' => 'nullable|string|max:255',
        'company_1_link' => 'nullable|string|max:255',
        'company_2' => 'nullable|string|max:255',
        'company_2_link' => 'nullable|string|max:255',
        'company_3' => 'nullable|string|max:255',
        'company_3_link' => 'nullable|string|max:255',
        'company_4' => 'nullable|string|max:255',
        'company_4_link' => 'nullable|string|max:255',
        'company_5' => 'nullable|string|max:255',
        'company_5_link' => 'nullable|string|max:255',
        'common_footer' => 'nullable|string|max:255',
        'common_1' => 'nullable|string|max:255',
        'common_1_link' => 'nullable|string|max:255',
        'common_2' => 'nullable|string|max:255',
        'common_2_link' => 'nullable|string|max:255',
        'common_3' => 'nullable|string|max:255',
        'common_3_link' => 'nullable|string|max:255',
        'legal_footer' => 'nullable|string|max:255',
        'legal_1' => 'nullable|string|max:255',
        'legal_1_link' => 'nullable|string|max:255',
        'legal_2' => 'nullable|string|max:255',
        'legal_2_link' => 'nullable|string|max:255',
        'legal_3' => 'nullable|string|max:255',
        'legal_3_link' => 'nullable|string|max:255',
        'facebook' => 'nullable|string|max:255',
        'twitter' => 'nullable|string|max:255',
        'instagram' => 'nullable|string|max:255',
        'linkedin' => 'nullable|string|max:255',
        'youtube' => 'nullable|string|max:255',
        'pinterest' => 'nullable|string|max:255',
        'google' => 'nullable|string|max:255',
        'dribbble' => 'nullable|string|max:255',
        'soundcloud' => 'nullable|string|max:255',
        'spotify' => 'nullable|string|max:255',
        'skype' => 'nullable|string|max:255',
        'whatsapp' => 'nullable|string|max:255',
        'telegram' => 'nullable|string|max:255',
        'email' => 'nullable|string|max:255',
    ]);

    // Find the Landing record by id
    $landing = Landing::find($id);

    if (!$landing) {
        return redirect()->route('landing')->with('error', 'Landing not found.');
    }

    // Update the Landing record with validated data
    $landing->update($validated);

    // Redirect with success message
    return redirect()->route('landing')->with('success', 'Landing updated successfully.');
}

}
