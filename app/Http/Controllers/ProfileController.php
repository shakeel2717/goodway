<?php

namespace App\Http\Controllers;

use App\Models\user;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = user::findOrFail(session('user')->id);
        return view('dashboard.profile.index', [
            'user' => $user,
        ]);
    }


    public function password()
    {
        return view('dashboard.profile.password');
    }


    public function passwordReq(Request $request)
    {
        $validated = $request->validate([
            'opassword' => 'required|string',
            'password' => 'required|string|confirmed',
        ]);

        // checking if password is correct
        if ($validated['opassword'] != session('user')->password) {
            return redirect()->back()->withErrors('Wrong Current Password, Please try again later!');
        }

        $task = user::find(session('user')->id);
        $task->password = $validated['password'];
        $task->save();
        session('user')->password = $validated['password'];
        return redirect()->back()->with('message', 'Profiel Password Updated Successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'mobile' => 'nullable|string',
            'code' => 'nullable|string',
        ]);
        $phone = $validated['code'] . $validated['mobile'];
        $task = user::find(session('user')->id);
        $task->fname = $validated['fname'];
        $task->lname = $validated['lname'];
        $task->mobile = $phone;
        $task->save();
        session(['user' => $task]);
        return redirect()->back()->with('message', 'Profiel Record Updated Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function refers()
    {
        $refers = user::where('refer', session('user')->username)->get();
        return view('dashboard.profile.refers',compact('refers'));
    }
}
