<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\wallet;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallet = wallet::where('user_id',session('user')->id)->first();
        return view('dashboard.wallet.index', [
            'wallet' => $wallet,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.wallet.create');
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
            'type' => 'required',
            'number' => 'required',
            'note' => 'required',
            'whatsapp' => 'required',
        ]);

        $task = wallet::find(session('user')->wallet->id);
        $task->type = $validated['type'];
        $task->number = $validated['number'];
        $task->note = $validated['note'];
        $task->whatsapp = $validated['whatsapp'];
        $task->save();
        return redirect()->back()->with('message', 'Task Completed Successfully');
        // return redirect()->back()->withErrors('Wrong Password, Please try again');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function show(wallet $wallet)
    {
        return view('dashboard.wallet.index', [
            'wallet' => $wallet,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $wallet = wallet::where('user_id',session('user')->id)->first();
        return view('dashboard.wallet.edit',[
            'wallet' => $wallet,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, wallet $wallet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\wallet  $wallet
     * @return \Illuminate\Http\Response
     */
    public function destroy(wallet $wallet)
    {
        $task = wallet::find($wallet->id);
        $task->delete();
        // return redirect()->route('pin.index')->with('message', 'Task Completed Successfully');
    }
}
