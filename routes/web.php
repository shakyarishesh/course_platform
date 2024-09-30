<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[CourseController::class,'courses']);
Route::get('/course_detail/{course_id}',[CourseController::class,'coursesDetail']);
Route::get('/search',[SearchController::class,'test']);

//for login
Route::view('/login','login');
Route::view('/signup','signup');
Route::post('/signupPost',[RegistrationController::class,'signup']);
Route::post('/loginPost',[RegistrationController::class,'login']);
Route::get('/logout',[RegistrationController::class,'logout']);

//profile
Route::get('/profile',[RegistrationController::class,'profile']);

//for dashboard
Route::get('/dashboard',[CartController::class,'getDashboard']);
Route::get('/cart/{course_id}',[CartController::class,'store']);