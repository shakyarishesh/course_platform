<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[CourseController::class,'courses']);
Route::get('/course_detail/{course_id}',[CourseController::class,'coursesDetail']);