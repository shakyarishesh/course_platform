<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Course;
use App\Models\Register;
use Illuminate\Pagination\LengthAwarePaginator;

class CourseController extends Controller
{
    public function courses()
    {
        // If the user is logged in, filter courses based on selected interests
        if (session()->get('login')) {
            $user_email = session()->get('login');
            $user = User::where('email', $user_email)->first();

            if ($user) {
                $reg = Register::where('id', $user->reg_id)->first();

                if ($reg && $reg->selected_courses) {
                    $selectedCourses = json_decode($reg->selected_courses);

                    if (!empty($selectedCourses)) {
                        $selectedCoursesArray = explode(',', $selectedCourses[0]);
                        $selectedCoursesArray = array_map('trim', $selectedCoursesArray);

                        // Get only the courses that match the user's selected categories
                        $filteredCourses = Course::whereIn('category', $selectedCoursesArray)->paginate(8);

                        return view('index', ['courses' => $filteredCourses]);
                    }
                }
            }
        }

        // If the user is not logged in or has no selected courses, show all courses
        $data = Course::paginate(8);
        
        
        // return view('index', ['courses' => $paginatedCourses]);
        // return view('courses.detail'); 
        return view('index', ['courses' => $data]);
    }

    public function createCategoryVector(array $selectedCategories, $allCategories)
    {
        // Create a binary vector for the selected categories
        return $allCategories->map(function ($category) use ($selectedCategories) {
            return in_array($category, $selectedCategories) ? 1 : 0;
        })->toArray();
    }

    public function cosineSimilarity(array $vectorA, array $vectorB)
    {
        $dotProduct = 0;
        $magnitudeA = 0;
        $magnitudeB = 0;

        foreach ($vectorA as $key => $value) {
            $dotProduct += $value * $vectorB[$key];
            $magnitudeA += $value ** 2;
            $magnitudeB += $vectorB[$key] ** 2;
        }

        $magnitudeA = sqrt($magnitudeA);
        $magnitudeB = sqrt($magnitudeB);

        if ($magnitudeA == 0 || $magnitudeB == 0) {
            return 0; // Avoid division by zero
        }

        return $dotProduct / ($magnitudeA * $magnitudeB);
    }
    
    public function coursesDetail($course_id)
    {
        $course = Course::where('id', $course_id)->first();

        if (!$course) {
            abort(404, 'Course not found.');
        }

        // Split the comma-separated benefits into an array
        $course->benefits = array_map('trim', explode(',', $course->benefits));

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




// namespace App\Http\Controllers;

// use App\Models\Course;
// use App\Models\Register;
// use App\Models\User;
// use Illuminate\Http\Request;
// use Illuminate\Support\Collection;
// use Illuminate\Pagination\LengthAwarePaginator; -->


// class CourseController extends Controller
// {

    //index page with recommending the user with selected courses
    // public function courses()
    // {
    //     if (session()->get('login')) {
    //         // Assuming the user is authenticated
    //         $user_email = session()->get('login');
    //         $user = User::where('email', $user_email)->first();

    //         $reg = Register::where('id', $user->reg_id)->first();

    //         // Get user's selected courses
    //         $selectedCourses = json_decode($reg->selected_courses); // Assuming it's stored as a JSON array
    //         if (!empty($selectedCourses)) {
    //             $selectedCoursesArray = explode(',', $selectedCourses[0]);
    //             $selectedCoursesArray = array_map('trim', $selectedCoursesArray); // Remove extra spaces

    //             // Get all courses from the database
    //             $allCourses = Course::all();

    //             // Convert user's selected courses to a binary vector based on course categories
    //             $userVector = $this->createCategoryVector($selectedCoursesArray, $allCourses);

    //             // Calculate cosine similarity for each course in the database
    //             $similarityScores = $allCourses->map(function ($course) use ($userVector, $allCourses) {
    //                 $courseVector = $this->createCategoryVector([$course->category], $allCourses);
    //                 return [
    //                     'course' => $course,
    //                     'similarity' => $this->cosineSimilarity($userVector, $courseVector),
    //                 ];
    //             });

    //             // Sort courses by similarity in descending order
    //             $sortedCourses = $similarityScores->sortByDesc('similarity')->pluck('course');

    //             // Paginate the sorted courses (e.g., 10 courses per page)
    //             $currentPage = LengthAwarePaginator::resolveCurrentPage();
    //             $perPage = 8;
    //             $currentPageItems = $sortedCourses->slice(($currentPage - 1) * $perPage, $perPage)->all();
    //             $paginatedCourses = new LengthAwarePaginator($currentPageItems, $sortedCourses->count(), $perPage, $currentPage, [
    //                 'path' => LengthAwarePaginator::resolveCurrentPath(),
    //             ]);

    //             return view('index', ['courses' => $paginatedCourses]);
    //         }
    //     }

    //     // If the user is not authenticated, or no selected courses are found, return all courses
    //     $data = Course::paginate(8); // Change this line to use pagination
    //     return view('index', ['courses' => $data]);
    // }


    // // Create a category vector for a set of selected categories
    // private function createCategoryVector(array $selectedCategories, Collection $allCourses)
    // {
    //     // Extract all unique categories from the course data
    //     $allCategories = $allCourses->pluck('category')->unique()->values();

    //     // Create a binary vector for selected categories
    //     return $allCategories->map(function ($category) use ($selectedCategories) {
    //         return in_array($category, $selectedCategories) ? 1 : 0;
    //     });
    // }

    // // Calculate cosine similarity between two vectors
    // private function cosineSimilarity(Collection $vectorA, Collection $vectorB)
    // {
    //     $dotProduct = $vectorA->zip($vectorB)->reduce(function ($carry, $values) {
    //         return $carry + ($values[0] * $values[1]);
    //     }, 0);

    //     $magnitudeA = sqrt($vectorA->reduce(fn($carry, $value) => $carry + ($value ** 2), 0));
    //     $magnitudeB = sqrt($vectorB->reduce(fn($carry, $value) => $carry + ($value ** 2), 0));

    //     return ($magnitudeA * $magnitudeB) ? $dotProduct / ($magnitudeA * $magnitudeB) : 0;
    // }


    // public function coursesDetail($course_id)
    // {
    //     $course = Course::where('id', $course_id)->first();

    //     if (!$course) {
    //         abort(404, 'Course not found.');
    //     }

    //     // Split the comma-separated benefits into an array
    //     $course->benefits = array_map('trim', explode(',', $course->benefits));

    //     // Fetch related courses (example: same category, excluding the current course)
    //     $relatedCourses = Course::where('category', $course->category)
    //         ->where('id', '!=', $course_id)
    //         ->limit(3)
    //         ->get();

    //     $recommended_courses = Course::all();

    //     return view('course_detail', [
    //         'coursedetails' => [$course],
    //         'relatedCourses' => $relatedCourses,
    //         'recommended_courses' => $recommended_courses
    //     ]);
    // }
// }
