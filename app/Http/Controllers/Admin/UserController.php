<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers()
    {
        $users = User::paginate(3);

        return view('admin.users', compact('users'));
    }

    public function editUsers(Request $request, $user_id)
    {
        $users = Course::findOrFail($user_id);
        $validate_data=$request->validate([
            'user_name'=>'required',
            'user_email'=>'required|email'
        ]);
        $users->update($validate_data);
        // Return a success response (you can adjust as needed)
        return redirect()->back()->with('success', 'User Credentials updated successfully.');
    }

    public function deleteUsers($user_id)
    {
        $users= User::where('id', $user_id)->delete();
        if ($users) {
            return redirect()->back()->with('message', 'User deleted successfully');
        }

        return redirect()->back()->with('error', 'User cannot be deleted');

    }
}
