<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Students::paginate(10);
        return view('students.index', compact('students'));
    }
    //approving func
    // StudentController.php

    public function approve(Request $request)
    {
        // Validate the request
        $request->validate([
            'student_id' => 'required|exists:students,id',
        ]);

        // Find the student and update status
        $student = Students::findOrFail($request->student_id);
        $student->status = 'approved';
        $student->save();

        // Redirect or respond
        return redirect()->back()->with('success', 'Student approved successfully.');
    }

    //editing func
    public function edit($id)
    {
        $student = Students::find($id);

        if ($student) {
            return view('students.edit', compact('student'));
        } else {
            return redirect()->route('students.index')->with('error', 'User not found');
        }
    }

    // StudentController.php

    public function update(Request $request, $id)
    {
        \Log::info('Update request received:', $request->all());

        $student = Students::findOrFail($id);
        $student->update($request->only([
            'name', 'email', 'phone_no', 'class_attended', 'status',
            'payment', 'telegram_username', 'gender', 'address', 'dob',
        ]));

        \Log::info('Student updated:', $student->toArray());

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function courses()
    {
        $courses = Courses::with('enrollments.student')->paginate(9);
        return view('students.courses', compact('courses'));
    }

    //filter function
    public function filter(Request $request)
    {
        // Start with a base query
        $query = Courses::query();

        // Filter by search term
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter by status
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Filter by type (beginner, intermediate, advanced)
        if ($request->filled('type') && $request->type !== 'all') {
            $query->where('level', $request->type);
        }

        // Filter by date
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        // Paginate the results and load enrollments with users
        $courses = $query->with('enrollments.student')->paginate(9);

        // Pass the filtered courses to the view
        return view('students.courses', compact('courses'));
    }

    //courses details
    public function detail($id)
    {
        // Fetch the course with the given ID, including related data
        $course = Courses::with(['subsections', 'enrollments.student'])
            ->find($id);

        // Check if the course was found
        if (!$course) {
            // Handle the case where the course is not found
            return redirect()->route('courses.index')->withErrors('Course not found');
        }

        // Ensure outcomes and instructor_experience are arrays or collections
        $course->outcomes = is_string($course->outcomes) ? json_decode($course->outcomes, true) : $course->outcomes;
        $course->instructor_experience = is_string($course->instructor_experience) ? json_decode($course->instructor_experience, true) : $course->instructor_experience;

        // Return the view with the course data
        return view('students.detail', compact('course'));
    }

    public function classes()
    {
        return view('classes');
    }
    public function attendance()
    {
        return view('attendance');
    }
    public function users_dash()
    {
        return view('users_dash');
    }
    public function certificates()
    {
        return view('certificates');
    }
}
