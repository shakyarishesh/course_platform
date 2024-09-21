<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function courses()
    {
        $data = Course::all();
        return view('index', ['courses' => $data]);
    }

    public function coursesDetail($course_id)
    {
        $course = Course::where('id', $course_id)->first();

        if (!$course) {
            abort(404, 'Course not found.');
        }

        $course->benefits = json_decode($course->benefits, true);

        // Fetch related courses (example: same category, excluding the current course)
        $relatedCourses = Course::where('category', $course->category)
            ->where('id', '!=', $course_id)
            ->limit(3)
            ->get();

        $recommended_courses = Course::all();

        return view('course_detail', [
            'coursedetails' => [$course],
            'relatedCourses' => $relatedCourses,
            'recommended_courses' => $recommended_courses
        ]);
    }
}
