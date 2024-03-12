<?php

namespace App\Http\Controllers;
use App\Models\Module;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Module::all();
        return view('Courses.index', compact('courses'));
    }
    public function show($id)
    {
        $course = Module::findOrFail($id);
        return view('Courses.show', compact('course'));
    }
}
