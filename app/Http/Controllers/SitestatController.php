<?php

namespace App\Http\Controllers;

use App\Models\Sites;
use Illuminate\Http\Request;

class SitestatController extends Controller
{
    public function community_config_update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'community_site_status' => 'required|string|in:on,off',
        ]);

        // Find the site with the given ID
        $sites = Sites::find($id);

        if ($sites) {
            // Update the community_site_status field
            $sites->community_site_status = $request->community_site_status;
            $sites->save();

            return redirect()->route('community.community')->with('status', 'Community site configured successfully!');
        } else {
            return redirect()->route('community.community')->with('error', 'Site not found.');
        }
    }
    public function community()
    {
        $sites = Sites::find(1); // Fetch all user pages
        return view('community.community', compact('sites'));
    }
    public function community_config()
    {
        $sites = Sites::find(1); // Fetch all user pages
        return view('community.community_config', compact('sites'));

    }
    // public function community_config_update(Request $request)
    // {
    //     // Find the site with the static ID 1
    //     $sites = Sites::find(1);

    //     if ($sites) {
    //         // Update the community_site_status field
    //         $sites->community_site_status = $request->community_site_status;
    //         $sites->save();

    //         return redirect()->route('community.community')->with('status', 'Community site configured successfully!');
    //     } else {
    //         return redirect()->route('community.community')->with('error', 'Site not found.');
    //     }
    // }

//////////////////////////////////////////////////////////////////////////////////////////////////////

    public function config()
    {
        $sites = Sites::find(1); // Fetch all user pages
        return view('blogs.config', compact('sites'));
    }
    public function config_edit()
    {
        $sites = Sites::find(1); // Fetch all user pages
        return view('blogs.config_edit', compact('sites'));
    }
    //blog site update
    public function config_update(Request $request, $id)
    {
        $sites = Sites::find($id);
        $sites->blog_site_status = $request->blog_site_status;
        $sites->save();
        return redirect(route('blogs.config'))->with('status', 'Blog site configured successfuly !');
    }
}
