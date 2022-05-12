<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }



    public function LoginReq(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|min:4|max:40|exists:admins',
            'password' => 'required|string|min:4|max:30',
        ]);
        // getting admin query
        $admin = admin::first();
        // checkking if password is true
        if ($validated['password'] != $admin->password) {
            return redirect()->route('admin.login')->withErrors('Wrong Account Detail, Please try again');
        }
        session(['admin' => $admin]);
        return redirect()->route('admin.dashboard');
    }




    // Logout admin
    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect(route('admin.login'));
    }
}
