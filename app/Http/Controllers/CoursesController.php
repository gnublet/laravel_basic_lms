<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $courses = Course::all()->paginate(10);
        $courses = Course::all();
        return view('courses.index')->with('courses', $courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
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
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'weeks' => 'required',
        ]);

        $course = new Course;
        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->start_date = $request->input('start_date');
        $course->weeks = $request->input('weeks');
        $course->save();

        return redirect('/courses')->with('success', 'Course Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        return view('courses.show')->with('course', $course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        return view('courses.edit')->with('course', $course);
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
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'weeks' => 'required',
        ]);

        // $course = new Course;
        $course = Course::find($id);
        $course->name = $request->input('name');
        $course->description = $request->input('description');
        $course->start_date = $request->input('start_date');
        $course->weeks = $request->input('weeks');
        $course->save();

        return redirect('/courses')->with('success', 'Course Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $course = Course::find($id);
        $course->delete();
        return redirect('/courses')->with('success', 'Course Deleted');
    }

    // public function listStudents(int $id)
    // {
    //     $course = Course::find($id);
    //     return $course->students();
    //     // foreach($course->students() as $student) {

    //     // }

    // }
}
