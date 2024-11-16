<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Traits\NgramTrait;
use Illuminate\Http\Request;

class BrowseController extends Controller
{
    use NgramTrait;

    public function index()
    {
        // Fetch all courses with pagination (e.g., 8 courses per page)
        $courses = Course::all();

        // Return the browse view with the paginated courses
        return view('browse', ['courses' => $courses]);
    }


}