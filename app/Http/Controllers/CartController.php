<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function store($course_id)
    {
        //get details of the course
        $courses = Course::where('id', $course_id)->first();

        //get user email for user details
        $user_email = session()->get('login');
        $user = User::where('email', $user_email)->first();

        if (session()->has('login')) {
            Cart::create([
                'user_id' => $user->id,
                'course_id' => $course_id,
                'status' => 'pending',
            ]);
        }


        return redirect('/');
    }

    public function getDashboard()
    {
        $user_email = session()->get('login');
        $user = User::where('email', $user_email)->first();


        $cart = Cart::where('user_id', $user->id)->pluck('course_id');

        if ($cart->isNotEmpty()) {
            $courses = Course::whereIn('id', $cart)->get();
            return view('dashboard', [
                'users' => $user,
                'courses' => $courses,
            ]);
        }else{
            return "No data available. Add something to cart to view data";
        }

        
    }
}
