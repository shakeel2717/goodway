<?php

namespace App\Http\Controllers;

use App\Models\bridge;
use Illuminate\Http\Request;

class BridgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bridge = bridge::all();
        return view('dashboard.bridge.index',[
            'bridges' => $bridge,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.bridge.create');
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
        $task = new bridge();
        $task->test = $validated['test'];
        $task->save();
        // return redirect()->back()->withErrors('Wrong Password, Please try again');
        // return redirect()->route('pin.index')->with('message', 'Task Completed Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\bridge  $bridge
     * @return \Illuminate\Http\Response
     */
    public function show(bridge $bridge)
    {
        return view('dashboard.bridge.index',[
            'bridge' => $bridge,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\bridge  $bridge
     * @return \Illuminate\Http\Response
     */
    public function edit(bridge $bridge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\bridge  $bridge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bridge $bridge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\bridge  $bridge
     * @return \Illuminate\Http\Response
     */
    public function destroy(bridge $bridge)
    {
        $task = bridge::find($bridge->id);
        $task->delete();
        // return redirect()->route('pin.index')->with('message', 'Task Completed Successfully');
    }
}