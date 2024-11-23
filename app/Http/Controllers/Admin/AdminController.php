<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Course;
use App\Models\User;

class AdminController extends Controller
{
    public function showAdminForm()
    {
        return view('admin.login');
    }

    public function adminLogin(Request $request)
    {   
        $validate_data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validate_data) {
            $admin = Admin::where('email', $request->email)->first();
            if ($admin && Hash::check($request->password, $admin->password)) {
                // Fetch total courses and users
                $courses = Course::count(); // Total number of courses
                $users = User::count();     // Total number of users

                return view('admin.dashboard', [
                    'courses' => $courses,
                    'users' => $users
                ]);
            } else {
                return back()->with('error', 'Invalid login credentials');
            }
        }
    }

     public function adminDashboard()
    {
        // Fetch total courses and users
        $courses = Course::count(); // Count total courses
        $users = User::count();     // Count total users

        // Pass data to the view
        return view('admin.dashboard', [
            'courses' => $courses, // Updated key
            'users' => $users,
        ]);
    }
}



