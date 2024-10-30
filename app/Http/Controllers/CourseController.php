<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;
use App\Models\Instructor;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('instructors')->get();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        $instructors = Instructor::all();
        return view('courses.create', compact('instructors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'instructor_id' => 'required|exists:instructors,id'
        ]);

        $course = Course::create($request->only('title', 'description'));
        $course->instructors()->attach($request->instructor_id);

        return redirect()->route('courses.index')->with('success', 'Course created successfully');
    }

    public function edit(Course $course)
    {
        $instructors = Instructor::all();
        return view('courses.edit', compact('course', 'instructors'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'instructor_id' => 'required|exists:instructors,id'
        ]);

        $course->update($request->only('title', 'description'));
        $course->instructors()->sync($request->instructor_id);

        return redirect()->route('courses.index')->with('success', 'Course updated successfully');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully');
    }

}
