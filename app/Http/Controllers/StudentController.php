<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students=Student::all();
        return view("student.list",compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("student.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'string|required',
            'email'=>'email|required',
            'phone'=>'numeric|required'
        ]);

        Student::create($request->all());

        $students=Student::all();
        return redirect()->route('students.list',compact('students'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student=Student::find($id);
        return view("student.edit",compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name'=>'string|required',
            'email'=>'email|required',
            'phone'=>'numeric|required'
        ]);

        $student->update($request->all());

        $students=Student::all();
        return redirect()->route('students.list',compact('students'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $student=Student::find($id);
        $student->delete();
        $students=Student::all();
        return redirect()->route('students.list',compact('students'));
    }
}
