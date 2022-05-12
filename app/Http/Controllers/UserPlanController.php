<?php

namespace App\Http\Controllers;

use App\Models\userPlan;
use Illuminate\Http\Request;

class UserPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userPlan = userPlan::all();
        return view('dashboard.userPlan.index',[
            'userPlans' => $userPlan,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.userPlan.create');
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
        // 'test' => 'required|min:4|max:30|exists:admins',
        ]);
        $task = new userPlan();
        $task->test = $validated['test'];
        $task->save();
        // return redirect()->back()->withErrors('Wrong Password, Please try again');
        // return redirect()->route('pin.index')->with('message', 'Task Completed Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\userPlan  $userPlan
     * @return \Illuminate\Http\Response
     */
    public function show(userPlan $userPlan)
    {
        return view('dashboard.userPlan.index',[
            'userPlan' => $userPlan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\userPlan  $userPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(userPlan $userPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\userPlan  $userPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, userPlan $userPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\userPlan  $userPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(userPlan $userPlan)
    {
        $task = userPlan::find($userPlan->id);
        $task->delete();
        // return redirect()->route('pin.index')->with('message', 'Task Completed Successfully');
    }
}