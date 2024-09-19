<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function signup(Request $request)
    {
        $fields = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'selected_courses' => 'required'

        ]);

        $reg = Register::create([
            'first_name' => $fields['first_name'],
            'last_name' => $fields['last_name'],
            'email' => $fields['email'],
            'password' => Hash::make($fields['password']),
            'selected_courses' => $fields['selected_courses'],
            ]);
        if ($reg) {
           
            return view('login');
        }else{
            return "hello";
            // return view('signup',['message'=>'Registration Unsuccessful']);
        }
    }

    public function login()
    {
        return "test";
    }
}
