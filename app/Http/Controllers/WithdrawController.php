<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use App\Models\wallet;
use App\Models\withdraw;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallet = wallet::where('user_id', session('user')->id)->first();
        return view('dashboard.withdraw.index', [
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
        return view('dashboard.withdraw.create');
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
            'amount' => 'required|numeric',
        ]);
        // checking if any withdraw request already in pending status
        $withdraw = withdraw::where('user_id', session('user')->id)->where('status', 'pending')->get();
        if ($withdraw->count() > 0) {
            return redirect()->back()->withErrors('You already have a pending withdraw request');
        }
        
        // checking if balance is less then or equal to available balance
        if (balance() < $validated['amount']) {
            return redirect()->back()->withErrors('You dont have enough balance');
        }

        $task = new withdraw();
        $task->user_id = session('user')->id;
        $task->amount = $validated['amount'];
        $task->status = "Pending";
        $task->save();

        $task = new transaction();
        $task->user_id = session('user')->id;
        $task->type = "Withdraw";
        $task->amount = $validated['amount'];
        $task->status = "Pending";
        $task->sum = "Out";
        $task->save();
        return redirect()->back()->with('message', 'Withdraw Request Sent Successfully');
        // return redirect()->back()->withErrors('Wrong Password, Please try again');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function show(withdraw $withdraw)
    {
        return view('dashboard.withdraw.index', [
            'withdraw' => $withdraw,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function edit(withdraw $withdraw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, withdraw $withdraw)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function destroy(withdraw $withdraw)
    {
        $task = withdraw::find($withdraw->id);
        $task->delete();
        // return redirect()->route('pin.index')->with('message', 'Task Completed Successfully');
    }
}
