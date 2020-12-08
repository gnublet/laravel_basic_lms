<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('students.index')->with('students', $students);
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
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            // 'matriculation_date' => 'required',
            // 'currently_enrolled' => 'required',
        ]);

        $student = new Student;
        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->email = $request->input('email');
        $student->password = $request->input('password');
        $student->matriculation_date = $request->input('matriculation_date');
        $student->currently_enrolled = $request->input('currently_enrolled');
        $student->save();

        return redirect('/students')->with('success', 'Student Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $student = Student::find($id);
        // return print_r($student->courses, TRUE);
        return view('students.show')->with('student', $student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $student = Student::find($id);
        return view('students.edit')->with('student', $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $this->validate($request,[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            // 'matriculation_date' => 'required',
            // 'currently_enrolled' => 'required',
        ]);

        $student = Student::find($id);
        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->email = $request->input('email');
        $student->password = $request->input('password');
        $student->matriculation_date = $request->input('matriculation_date');
        $student->currently_enrolled = $request->input('currently_enrolled');
        $student->save();

        return redirect('/students')->with('success', 'Student Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    // TODO: Should we pass ids through a form. If so, we need to validate student is the same (not being able to change someone else's courses
    public function enroll(Request $request)
    {
        $this->validate($request,[
            'student_id' => 'required',
            'course_id' => 'required',
        ]);
        $student_id = $request->input('student_id');
        $course_id = $request->input('course_id');

        // TODO: handle if $student_id or $course_id does not exist or if already enrolled
        $student = Student::find($student_id);
        $student->courses()->attach($course_id);
        return redirect("/students/{$student_id}")->with('success', 'Student Enrolled in Course');
    }
}
