<?php

namespace App\Http\Controllers;

use App\Models\CourseModule;
use App\Models\Courses;
use App\Models\Subsection;
use Illuminate\Http\Request;

class CourseController extends Controller
{
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

        // Return the view with the course data
        return view('students.detail', compact('course'));
    }

    //courses management

    public function manage()
    {
        $courses = Courses::with('enrollments.student')->paginate(12);
        return view('students.manage', compact('courses'));
    }

    //create course

    public function create()
    {
        return view('students.course.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'outcomes' => 'required|string|max:255',
            'instructor_experience' => 'required|string|max:255',
            'start_date' => 'required|string|max:255',
        ]);

        // Create the course and store it in the database
        $course = Courses::create([
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'description' => $validated['description'],
            'image' => $validated['image'],
            'duration' => $validated['duration'],
            'category' => $validated['category'],
            'status' => $validated['status'],
            'level' => $validated['level'],
            'outcomes' => $validated['outcomes'],
            'instructor_experience' => $validated['instructor_experience'],
            'start_date' => $validated['start_date'],
        ]);

        // Redirect to the edit page for the newly created course
        return redirect()->route('courses.edit', ['course' => $course->id])
            ->with('success', 'Course created successfully.')
            ->with('enrollments', $course->enrollments)
            ->with('subsections', $course->subsections);

    }
    //editing the subsection
    public function edit($id)
    {
        // Find the subsection by its ID
        $subsection = Subsection::findOrFail($id);

        // Load the related course
        $course = $subsection->course;

        // Load the enrollments for the course
        $enrollments = $course->enrollments()->with('student')->get();

        // Load the course modules for the subsection
        $courseModules = $subsection->courseModules; // Since CourseModule belongs to Subsection

        // Pass the data to the blade view
        return view('students.course.subsection_edit', compact('subsection', 'course', 'enrollments', 'courseModules'));
    }

    //edit show
    public function config($id)
    {
        // Find the course by its ID
        $courses = Courses::with([
            'subsections' => function ($query) {
                $query->orderBy('order', 'asc'); // Order subsections by the 'order' field
            },
            'enrollments.student', // Load enrollments along with the associated students
            'subsections.courseModules' => function ($query) {
                $query->orderBy('order', 'asc'); // Order course modules by the 'order' field
            },
            'subsections.badges', // Load badges associated with subsections
            'quizzes.questions.answers', // Load quizzes, their questions, and answers for each question
        ])->find($id);

        // Check if the course exists
        if ($courses) {
            return view('students.course.config', compact('courses'));
        } else {
            return redirect()->route('students.manage.course.config')->with('error', 'Course not found');
        }
    }

    public function update(Request $request, $id)
    {

        $subsection = Subsection::findOrFail($id);
        $subsection->update($request->only([
            'name', 'detail', 'order', 'description',
        ]));

        return redirect()->route('subsection.edit', ['id' => $subsection->id])
            ->with('success', 'Subsection updated successfully.')
            ->with('success', 'Student updated successfully.');
    }
    public function destroy($id)
    {
        $subsection = Subsection::findOrFail($id);
        $subsection->delete();

        return redirect()->back()->with('success', 'Subsection deleted successfully.');
    }

    //subsection create
    public function sub_create($id)
    {
        // Find the course by its ID
        $course = Courses::findOrFail($id);

        $lastOrder = Subsection::where('course_id', $id)->max('order');

        // Set the next order value
        $nextOrder = $lastOrder ? $lastOrder + 1 : 1;

        // Get all courses for the select menu
        $allCourses = Courses::all();

        // Pass the course data and all courses to the blade view
        return view('students.course.subsection_create', compact('course', 'allCourses', 'nextOrder'));
    }
    public function sub_store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'detail' => 'required|string|max:255',
            'order' => 'required|integer',
            'description' => 'required|string',
            'course_id' => 'required|exists:courses,id', // Ensure course_id is valid
        ]);

        // Create the subsection
        Subsection::create([
            'name' => $validated['name'],
            'detail' => $validated['detail'],
            'order' => $validated['order'],
            'description' => $validated['description'],
            'course_id' => $validated['course_id'], // Save course_id
        ]);

        // Redirect back to the subsection creation page with the course ID
        return redirect()->route('courses.edit', ['id' => $validated['course_id']])
            ->with('success', 'Subsection created successfully.');
    }
    public function viewModule($id)
    {
        // Retrieve the subsection by its ID
        $subsection = Subsection::findOrFail($id);

        // Retrieve all course modules associated with the subsection, ordered by 'order' field
        $module = CourseModule::where('subsection_id', $id)
            ->orderBy('order', 'asc') // Order by 'order' field in ascending order
            ->get();

        return view('students.course.module_view', compact('subsection', 'module'));
    }

    //course module create
    public function module($subsectionId, $moduleId)
    {
        // Retrieve the subsection by its ID
        $subsection = Subsection::findOrFail($subsectionId);

        // Retrieve the specific module by its ID
        $module = CourseModule::where('id', $moduleId)
            ->where('subsection_id', $subsectionId)
            ->firstOrFail();

        return view('students.course.module_edit', compact('subsection', 'module'));
    }

    //course module store
    public function addModule($subsectionId)
    {
        // Retrieve the subsection by its ID
        $subsection = Subsection::findOrFail($subsectionId);

        // Return the view to create a new course module, passing only the subsection
        return view('students.course.module_add', compact('subsection'));
    }

    public function module_add(Request $request)
    {
        $validated = $request->validate([
            'subsection_id' => 'required|exists:subsection,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'video_url' => 'required|string',
            'order' => 'required|integer',
        ]);

        // Create the new module
        CourseModule::create([
            'subsection_id' => $validated['subsection_id'],
            'name' => $validated['name'],
            'description' => $validated['description'],
            'video_url' => $validated['video_url'],
            'order' => $validated['order'],
        ]);

        // Redirect back to the modules view with success message
        return redirect()->route('subsection.view', $validated['subsection_id'])
            ->with('success', 'Module added successfully!');
    }
    public function module_store(Request $request, $subsectionId)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'video_url' => 'required|string',
            'order' => 'required|integer',
        ]);

        // Find the specific module by subsection ID and module ID
        // Assuming 'module_id' is passed in the form as a hidden field
        $module = CourseModule::where('subsection_id', $subsectionId)
            ->where('id', $request->module_id) // Ensure module_id is in the form
            ->firstOrFail();

        // Update the module with the validated data
        $module->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'video_url' => $validated['video_url'],
            'order' => $validated['order'],
        ]);

        // Redirect back to the modules view with a success message
        return redirect()->route('subsection.module', ['subsectionId' => $subsectionId, 'moduleId' => $module->id])
            ->with('success', 'Module updated successfully!');
    }

    //course module delete
    public function module_delete($subsectionId, $moduleId)
    {
        // Find the specific module by subsection ID and module ID
        $module = CourseModule::where('subsection_id', $subsectionId)
            ->where('id', $moduleId)
            ->firstOrFail();

        // Delete the module
        $module->delete();

        // Redirect back to the modules view with a success message
        return redirect()->back()->with('success', 'Module deleted successfully!');
    }

}
