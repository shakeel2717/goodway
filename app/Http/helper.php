<?php

use App\Models\admin;
use App\Models\bridge;
use App\Models\commission;
use App\Models\donation;
use App\Models\plan;
use App\Models\transaction;
use App\Models\user;
use App\Models\userPlan;
use App\Models\withdraw;

function onGoing()
{
    // calculating On Going Donation
    $onGoing = donation::where('user_id', session('user')->id)->where('status', 'Pending')->get();
    if (count($onGoing) < 1) {
        return 0;
    }
    $planDetail = plan::find($onGoing[0]->plan_id);
    return $planDetail->price;
}

function balance()
{
    //getting In
    $in = transaction::where('user_id', session('user')->id)->where('sum', "In")->sum('amount');
    // Getting Out
    $out = transaction::where('user_id', session('user')->id)->where('sum', 'Out')->sum('amount');
    $balance = $in - $out;

    return $balance;
}


function willRecieve()
{
    $amount = 0;
    // checking this user current plan
    $user_plan = userPlan::where('user_id', session('user')->id)->where('status','Active')->first();
    if ($user_plan != "") {
        $amount = $user_plan->plan->price * 1.5;
    }
    return $amount;
}


function sendDonations()
{
    $in = bridge::where('user_id', session('user')->id)->sum('sent');
    return $in;
}


function totalCommision()
{
    $in = commission::where('user_id', session('user')->id)->where('sum','In')->sum('amount');
    $out = commission::where('user_id', session('user')->id)->where('sum','Out')->sum('amount');
    return $in - $out;
}

function totalWithdraw()
{
    $in = transaction::where('user_id', session('user')->id)->where('type', 'Withdraw')->sum('amount');
    return $in;
}

function pendingWithdraw()
{
    $in = withdraw::where('user_id', session('user')->id)->where('status', "Pending")->sum('amount');
    return $in;
}

function activeWithdraw()
{
    $in = transaction::where('user_id', session('user')->id)->where('type', 'Withdraw')->where('status', 'Approved')->sum('amount');
    return $in;
}
