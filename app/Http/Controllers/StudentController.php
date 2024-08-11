<?php

namespace App\Http\Controllers;

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
        'payment', 'telegram_username', 'gender', 'address', 'dob'
    ]));

    \Log::info('Student updated:', $student->toArray());

    return redirect()->route('students.index')->with('success', 'Student updated successfully.');
}


    public function docs()
    {
        return view('docs');
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
