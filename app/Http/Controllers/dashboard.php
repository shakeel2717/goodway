<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\attachment;
use App\Models\bridge;
use App\Models\commission;
use App\Models\transaction;
use App\Models\userPlan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class dashboard extends Controller
{
    public function index(Request $request)
    {
        // calculating the complete amount in bridget database
        $bridge = bridge::where('user_id', $request->session()->get('user')->id)->where('status', 'Open')->first();
        $complete = 0;
        if ($bridge != "") {
            $complete = ($bridge->sent / $bridge->total) * 100;
        }

        // checking if any attatchment for this user
        $senders = attachment::where('sender', session('user')->id)->where('status', 'Queue')->get();
        $receiver = attachment::where('receiver', session('user')->id)->where('status', '!=', 'Complete')->get();
        // getting this user's plan
        $plan = userPlan::where('user_id', session('user')->id)->where('status', 'Active')->first();
        $expireDays = '';
        if ($plan != "") {
            // getting plan expiery date in day
            $st_date = $plan->created_at;
            $end_date = $plan->exp_date;
            $expireDays = Carbon::parse($end_date)->diffInDays(now());
        }

        return view('dashboard.index', compact('bridge', 'complete', 'senders', 'receiver', 'expireDays'));
    }

    public function collectCommission()
    {
        $admin = admin::first();
        if (totalCommision() < $admin->commission) {
            return redirect()->back()->withErrors('You have not collected enough commission, Current Limit is ' . number_format($admin->commission, 2));
        }
        // inserting commision transaction
        $commission = new commission();
        $commission->user_id = session('user')->id;
        $commission->status = "Approved";
        $commission->amount = $admin->commission;
        $commission->sum = "Out";
        $commission->save();
        // inserting commision transaction
        $transaction = new transaction();
        $transaction->user_id = session('user')->id;
        $transaction->status = "Approved";
        $transaction->amount = $admin->commission;
        $transaction->type = "Commission";
        $transaction->sum = "In";
        $transaction->save();
        return redirect()->back()->with('message', 'Commission Collected');
    }
}
