<?php

namespace App\Http\Controllers;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        // dd($students);
        return view('students.index', compact('students')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_name'=>'required',
            'student_rollno'=> 'required|integer',
            'student_marks' => 'required|integer'
          ]);
          $student = new Student([
            'student_name' => $request->get('student_name'),
            'student_rollno'=> $request->get('student_rollno'),
            'student_marks'=> $request->get('student_marks')
          ]);
          $student->save();
          return redirect('/students')->with('success', 'Student has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);

        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_name'=>'required',
            'student_rollno'=> 'required|integer',
            'student_marks' => 'required|integer'
          ]);
    
          $student = Student::find($id);
          $student->student_name = $request->get('student_name');
          $student->student_rollno = $request->get('student_rollno');
          $student->student_marks = $request->get('student_marks');
          $student->save();
    
          return redirect('/students')->with('success', 'Student has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
   
        return redirect('/students')->with('success', 'Student has been deleted Successfully');
    }
}
