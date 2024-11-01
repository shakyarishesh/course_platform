<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    public function showCourses()
    {
        $courses = Course::paginate(10);

        if($courses)
        {
            return view('admin.courses', compact('courses'));
        }
        return view('admin.courses');
    }
    public function storeCourses(Request $request)
    {
        $validate_data = $request->validate([
            'title' => 'required',
            'teacher' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'image' => 'required',
            'category' => 'required',
            'level' => 'required',
            'discount' => 'required',
            'benefits' => 'required',
        ]);

        $courses = Course::insert($validate_data);

        if($courses)
        {
            return redirect()->back()->with(['message' => 'course added successfully']);
        }

        return redirect()->back()->with(['error' => 'courses could not be added']);
        
    
    }

    public function deleteCourses($course_id)
    {
        $course = Course::where('id', $course_id)->delete();
        if($course)
        {
            return redirect()->back()->with('message', 'Course deleted successfully');
        }

        return redirect()->back()->with('error', 'Course cannot be deleted');
    }
}
