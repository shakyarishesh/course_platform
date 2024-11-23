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
            if($request->email == $admin->email && Hash::check($request->password, $admin->password))
            {
                session()->put('adminLogin', $admin);
                return redirect()->route('admin.dashboard');
            }
        }
    }

    public function adminLogout()
    {
        session()->flush();
        return redirect()->route('admin.loginForm');
    }
}
