<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CourseController as AdminCourseController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BrowseController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

//admin
Route::get('/admin/login', [AdminController::class, 'showAdminForm'])->name('admin.loginForm');
Route::post('/admin/loginPost', [AdminController::class, 'adminLogin'])->name('admin.login');
Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');
Route::get('/admin/dashboard',[AdminCourseController::class,'dashboard'])->name("admin.dashboard");
Route::get('/admin/courses',[AdminCourseController::class, 'showCourses'])->name('admin.view.course');

Route::get('/admin/users', [UserController::class, 'getUsers'])->name('admin.view.users');
Route::put('/admin/edit/users/{user_id}', [UserController::class, 'editUsers'])->name('admin.edit.user');
Route::get('/admin/users/{user_id}', [UserController::class, 'deleteUsers'])->name('admin.delete.user');

Route::post('/admin/courses', [AdminCourseController::class, 'storeCourses'])->name('admin.store.course');
Route::get('/admin/courses/{course_id}', [AdminCourseController::class, 'deleteCourses'])->name('admin.delete.course');
Route::put('/admin/edit/courses/{course_id}', [AdminCourseController::class, 'editCourses'])->name('admin.edit.course');


//for courses
Route::get('/',[CourseController::class,'courses']);
Route::get('/course_detail/{course_id}',[CourseController::class,'coursesDetail'])->name('course_details');
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

//for browse
Route::get('/browse', [BrowseController::class , 'index'])->name('browse');
Route::get('/search', [BrowseController::class , 'search'])->name('search');
