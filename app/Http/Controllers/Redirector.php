<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function showSiteStatusForm()
    {
        $currentStatus = DB::table('sited')->value('site_status');
        return view('blogs.config', ['currentStatus' => $currentStatus]);
    }

    public function updateSiteStatus(Request $request)
    {
        $request->validate([
            'site_status' => 'required|string|in:on,off',
        ]);

        // Update the site status in the 'sited' table
        $status = $request->input('site_status') == 'on' ? 'On' : 'Off';
        DB::table('sited')->update(['site_status' => $status]);

        return redirect()->back()->with('success', 'Site status updated successfully');
    }
}
