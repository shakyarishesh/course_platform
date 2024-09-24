<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[CourseController::class,'courses']);
Route::get('/course_detail/{course_id}',[CourseController::class,'coursesDetail']);

//for login
Route::view('/login','login');
Route::view('/signup','signup');
//for signup
Route::post('/signupPost',[RegistrationController::class,'signup']);
//for login
Route::post('/loginPost',[RegistrationController::class,'login']);

//logout
Route::get('/logout',[RegistrationController::class,'logout']);

//profile
Route::get('/profile',[RegistrationController::class,'profile']);

//for dashboard
Route::get('/dashboard',[DashboardController::class,'getDashboard']);