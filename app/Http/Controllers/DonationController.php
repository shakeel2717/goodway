<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\bridge;
use App\Models\donation;
use App\Models\plan;
use App\Models\transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = plan::all();
        return view('dashboard.donation.index',[
            'plans' => $plans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.donation.create');
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
        'plan_id' => 'required|integer',
        ]);
        $user = User::find(session('user')->id);

        // checking if this user have valid Wallet
        if ($user->wallet->type == "" || $user->wallet->number == "" || $user->wallet->whatsapp == "") {
            return redirect()->route('wallet.edit')->withErrors('Please add a Wallet before Apply for Donation');
        }

        // getting this plan detail
        $planDetail = plan::find($validated['plan_id']);
        // checking if already any donation in process
        $security = donation::where('user_id',session('user')->id)->where('status','Pending')->count();
        if ($security > 0) {
            return redirect()->back()->withErrors('Your Older Package is Already Inprocess Please Clear That Donation While Choosing New One.');
        }

        $task = new donation();
        $task->user_id = session('user')->id;
        $task->plan_id = $validated['plan_id'];
        $task->save();

        // inserting this donation bridge in database
        $bridge = new bridge();
        $bridge->donation_id = $task->id;
        $bridge->user_id = session('user')->id;
        $bridge->total = $planDetail->price;
        $bridge->sent = 0;
        $bridge->status = "Open";
        $bridge->save();

        return redirect()->back()->with('message', 'Your Request Recieved, Please wait..');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show(donation $donation)
    {
        return view('dashboard.donation.index',[
            'donation' => $donation,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(donation $donation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, donation $donation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy(donation $donation)
    {
        $task = donation::find($donation->id);
        $task->delete();
        // return redirect()->route('pin.index')->with('message', 'Task Completed Successfully');
    }
}
