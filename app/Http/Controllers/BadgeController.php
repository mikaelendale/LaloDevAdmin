<?php

namespace App\Http\Controllers;

use App\Models\Badge;
use App\Models\CourseBadge;
use App\Models\Courses;
use Illuminate\Http\Request;

class BadgeController extends Controller
{
    // Display form for creating a new badge for a course
    public function createBadge($courseId)
    {
        // Find the selected course
        $selectedCourse = Courses::findOrFail($courseId);

        // Get all courses to populate the dropdown
        $courses = Courses::all();

        return view('badges.create', compact('selectedCourse', 'courses'));
    }

    // Display form for editing an existing badge
    public function edit(Courses $course, Badge $badge)
    {
        // Return the view with course and badge data
        return view('badges.edit', [
            'course' => $course,
            'badge' => $badge,
        ]);
    }

    public function update(Request $request, $courseId, $badgeId)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'icon' => 'required|string',
        'color' => 'required|string',
    ]);

    $badge = Badge::findOrFail($badgeId);
    $badge->update($request->only('name', 'description', 'icon', 'color'));

    return redirect()->route('courses.edit', $courseId)->with('success', 'Badge updated successfully!');
}


    // Delete the badge
    public function destroy(Badge $badge)
    {
        $badge->delete();

        return redirect()->back()->with('success', 'Badge deleted successfully!');
    }
    public function store(Request $request, $course)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'color' => 'nullable|string',
            'course_id' => 'required|exists:courses,id',
        ]);

        // Create the new badge
        $badge = Badge::create($validated);

        // Attach the badge to the course
        CourseBadge::create([
            'course_id' => $course,
            'badge_id' => $badge->id,
        ]);

        return redirect()->route('courses.edit', $course)->with('success', 'Badge created successfully!');
    }

}
