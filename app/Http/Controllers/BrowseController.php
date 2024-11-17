<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class BrowseController extends Controller
{

    public function index()
    {
        $courses = Course::all();

        // Return the browse view with the paginated courses
        return view('browse', ['courses' => $courses]);
    }

    public function search(Request $request)
    {
        // Get the search query from the request
        $searchQuery = $request->input('search');
    
        // Fetch courses, filtering by title if a search query exists
        $courses = Course::when($searchQuery, function ($query, $searchQuery) {
            $query->where('category', 'LIKE', "%$searchQuery%");
        })->get(); 
    
        // Return the browse view with the filtered courses
        return view('browse', ['courses' => $courses, 'searchQuery' => $searchQuery]);
    }


}