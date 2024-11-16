<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function getUsers()
    {
        $users = User::paginate(3);

        return view('admin.users', compact('users'));
    }

    public function editUsers(Request $request, $user_id)
    {
        $users = Course::findOrFail($user_id);
        $validate_data=$request->validate([
            'user_name'=>'required',
            'user_email'=>'required|email'
        ]);
        $users->update($validate_data);
        // Return a success response (you can adjust as needed)
        return redirect()->back()->with('success', 'User Credentials updated successfully.');
    }

    public function showCourses()
    {
        $courses = Course::paginate(10);

        if ($courses) {
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

        // if($request->hasFile('image'))
        // {
        //     $path = $request->file('image')->store('imgs', 'public');

        // }

        $courses = Course::insert($validate_data);

        if ($courses) {
            return redirect()->back()->with(['message' => 'course added successfully']);
        }

        return redirect()->back()->with(['error' => 'courses could not be added']);


    }

    public function deleteCourses($course_id)
    {
        $course = Course::where('id', $course_id)->delete();
        if ($course) {
            return redirect()->back()->with('message', 'Course deleted successfully');
        }

        return redirect()->back()->with('error', 'Course cannot be deleted');
    }

    public function editCourses(Request $request, $course_id)
    {
        $course = Course::findOrFail($course_id);

        // Validate the incoming request data
        $validated_data = $request->validate([
            'title' => 'required|string|max:255',
            'teacher' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image
            'category' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            'discount' => 'required|numeric|min:0|max:100', // Assuming percentage
            'benefits' => 'required|string',
        ]);


        $course->update($validated_data);

        // Return a success response (you can adjust as needed)
        return redirect()->back()->with('success', 'Course updated successfully.');
    }
}
