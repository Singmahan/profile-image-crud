<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    // Add Student
    public function create(){
        return view('students.create');
    }
    public function store(Request $request){
        $name = $request->name;
        $email = $request->email;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);

        $student = new Student();
        $student->name = $name;
        $student->email = $email;
        $student->profileimage = $imageName;
        $student->save();

        return back()->with('student_added','Student has saved successfully.');
    }
    // index show student
    public function index(){
        $students = Student::all();
        return view('students.index', compact('students'));
    }
    // View
    public function show($id){
        $student = Student::find($id);
        return view('students.show', compact('student'));
    }
    // Edit
    public function edit($id){
        $student = Student::find($id);
        return view('students.edit', compact('student'));
    }
    // Update
    public function update(Request $request){
        $name = $request->name;
        $email = $request->email;
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'), $imageName);

        $student = Student::find($request->id);
        $student->name = $name;
        $student->email = $email;
        $student->profileimage = $imageName;
        $student->save();

        return back()->with('student_update','Student has update successfully.');
    }
    // Delete
    public function destroy($id){
        $student = Student::find($id);
        unlink(public_path('images').'/'.$student->profileimage);
        $student->delete();
        return back();
    }
}
