<?php
namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'roll_no' => 'required|unique:students,roll_no',
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
            'department' => 'required',
            'semester' => 'required|integer',
            'cgpa' => 'nullable|numeric',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')
            ->with('status', 'Student added successfully!');
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
