<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\wallet;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }


    public function loginReq(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|min:4|max:40|exists:users',
            'password' => 'required|string|min:8|max:30',
        ]);
        // getting this user data
        $userDetail = User::where('username', $validated['username'])->where('password', $validated['password'])->first();
        if ($userDetail != "") {
            // checking if this user status is not Suspended
            if ($userDetail->status == "Suspended") {
                return redirect()->route('login')->withErrors('Your Account is Suspended, Please Contact Admin');
            }
            // storing login sesssion
            session(['user' => $userDetail]);
            return redirect()->route('dashboard');
        } else {
            return redirect()->route('login')->withErrors('Wrong Account Detail, Please try again');
        }

    }

    public function register($username = "Default")
    {
        return view('auth.register',[
            'refer' => $username,
        ]);
    }

    public function registerReq(Request $request)
    {
        $validated = $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'username' => 'required|string|unique:users',
            'email' => 'required|email|min:8|max:40|unique:users',
            'password' => 'required|string|min:8|max:30',
            'refer' => 'nullable',
        ]);
        
        $task = new user();
        $task->fname = $validated['fname'];
        $task->lname = $validated['lname'];
        $task->username = $validated['username'];
        $task->email = $validated['email'];
        $task->password = $validated['password'];
        $task->refer = $validated['refer'];
        $task->save();


        // creating wallet for this user
        $wallet = new wallet();
        $wallet->user_id = $task->id;
        $wallet->save();

        return redirect()->route('login')->with('message', 'New User Registered Successfully');
    }


    public function reset()
    {
        return view('auth.reset');
    }

    public function resetReq(Request $request)
    {
        return view('auth.login');
    }


    public function update()
    {
        return view('auth.update');
    }

    public function updateReq(Request $request)
    {
        return view('auth.login');
    }


    // Logout
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect(route('login'));
    }
}
