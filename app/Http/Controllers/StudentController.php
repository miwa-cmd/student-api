<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // GET all students
    public function index()
    {
        return Student::all();
    }

    // POST create student
    public function store(Request $request)
    {
        $student = Student::create([
            'name' => $request->name,
            'course' => $request->course,
            'age' => $request->age,
        ]);

        return response()->json($student, 201);
    }

    // GET single student
    public function show(string $id)
    {
        return Student::findOrFail($id);
    }

    // PUT update student
    public function update(Request $request, string $id)
    {
        $student = Student::findOrFail($id);

        $student->update([
            'name' => $request->name,
            'course' => $request->course,
            'age' => $request->age,
        ]);

        return response()->json($student, 200);
    }

    // DELETE student
    public function destroy(string $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return response()->json([
            'message' => 'Student deleted successfully'
        ]);
    }
}
