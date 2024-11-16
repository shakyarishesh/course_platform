<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function dashboard()
    {
        $courses = Course::count();
        $users = User::count();

        return view('admin.dashboard', compact('courses', 'users'));

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

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('imgs', 'public');
            $validate_data['image'] = $path;
        }


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
        // $validated_data = $request->validate([
        //     'title' => 'required|string|max:255',
        //     'teacher' => 'required|string|max:255',
        //     'description' => 'nullable|string',
        //     'price' => 'required|numeric|min:0',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image
        //     'category' => 'required|string|max:255',
        //     'level' => 'required|string|max:255',
        //     'discount' => 'required|numeric|min:0|max:100', // Assuming percentage
        //     'benefits' => 'nullable|string',
        // ]);
        $validated_data = $request->all();

        if ($request->hasFile('image')) {
            // Delete the old image file if it exists
            if ($course->image) {
                Storage::disk('public')->delete($course->image);
            }
    
            // Store the new image file and update the path in validated data
            $path = $request->file('image')->store('imgs', 'public');
            $validated_data['image'] = $path;
        }

        $course->update($validated_data);

        // Return a success response (you can adjust as needed)
        return redirect()->back()->with('success', 'Course updated successfully.');
    }
}
