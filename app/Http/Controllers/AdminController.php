<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\attachment;
use App\Models\bridge;
use App\Models\donation;
use App\Models\donner;
use App\Models\plan;
use App\Models\transaction;
use App\Models\User;
use App\Models\userPlan;
use App\Models\wallet;
use App\Models\withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // calculate sum of plans via pending donations
        $donations = donation::where('status', 'pending')->get();
        $totalOnGoingDonations = 0;
        foreach ($donations as $donation) {
            $totalOnGoingDonations += $donation->plan->price;
        }
        // calculate sum of plans via pending donations
        $donations = donation::where('status', 'Complete')->get();
        $totalCompleteDonations = 0;
        foreach ($donations as $donation) {
            $totalCompleteDonations += $donation->plan->price;
        }
        return view('admin.index', [
            'admins' => admin::all(),
            'users' => User::all(),
            'totalOnGoingDonations' => $totalOnGoingDonations,
            'totalCompleteDonations' => $totalCompleteDonations,
            'plans' => plan::all(),
        ]);
    }

    public function users()
    {
        return view('admin.dashboard.users', [
            'users' => User::all(),
        ]);
    }


    public function wallets()
    {
        return view('admin.dashboard.wallets', [
            'wallets' => wallet::all(),
        ]);
    }

    public function transactions()
    {
        return view('admin.dashboard.transactions', [
            'transactions' => transaction::all(),
        ]);
    }



    public function userSuspend($user)
    {
        $task = User::find($user);
        $task->status = "Suspended";
        $task->save();
        return redirect()->back()->with('message', 'Account Successfully Suspended');
    }

    public function userActive($user)
    {
        $task = User::find($user);
        $task->status = "Active";
        $task->save();
        return redirect()->back()->with('message', 'Account Successfully Suspended');
    }


    public function plans()
    {
        return view('admin.dashboard.plans', [
            'plans' => plan::all(),
        ]);
    }

    public function donation()
    {
        return view('admin.dashboard.donation', [
            'donations' => donation::all(),
        ]);
    }


    public function attached()
    {
        return view('admin.dashboard.attached', [
            'attachments' => attachment::where('status', 'Queue')->get(),
        ]);
    }


    public function bridge()
    {
        return view('admin.dashboard.bridge', [
            'bridges' => bridge::get(),
        ]);
    }


    public function withdraw()
    {
        return view('admin.dashboard.withdraw', [
            'withdraws' => withdraw::get(),
        ]);
    }

    public function attachment()
    {
        $donations = donation::where('status', 'Pending')->get();
        $withdraws = withdraw::where('status', 'Pending')->get();
        return view('admin.dashboard.attachment', compact('donations', 'withdraws'));
    }


    public function reAttachment()
    {
        $donations = donation::where('status', 'Used')->get();
        $withdraws = withdraw::where('status', 'Pending')->get();
        return view('admin.dashboard.reAttachment', compact('donations', 'withdraws'));
    }



    public function reAttachmentReq($id, Request $request)
    {
        $validated = $request->validate([
            'donation_id' => 'required',
            'withdraw_id' => 'required',
        ]);
        // Proccess of assignment of attachment to a Withdraw User.
        $donation = donation::find($validated['donation_id']);
        $withdraw = withdraw::find($validated['withdraw_id']);
        $donner = $donation->donner;
        $bridge = bridge::where('user_id', $donation->user->id)->where('status', 'Open')->first();
        Log::info('Withdraw Amount is Greater then Left Amount');
        // $alreadyAttached = attachment::where('donation_id', $donation->id)
        //     ->where('bridge_id', $bridge->id)
        //     ->where('sender', $donation->user->id)
        //     ->where('receiver', $withdraw->user->id)
        //     ->where('status', "Queue")
        //     ->first();
        // if ($alreadyAttached == "") {
        $amountWithdraw = $withdraw->amount;
        $attachment = new attachment();
        $attachment->donation_id = $donation->id;
        $attachment->bridge_id = $bridge->id;
        $attachment->sender = $donation->user->id;
        $attachment->receiver = $withdraw->user->id;
        $attachment->amount = $withdraw->amount;
        $attachment->status = "Queue";
        $attachment->save();
        $withdraw->amount -= $amountWithdraw;
        $withdraw->save();

        // storing into donner table
        $donner = new donner();
        $donner->user_id = $donation->user->id;
        $donner->donation_id = $donation->id;
        $donner->receiver_id = $withdraw->user->id;
        $donner->amount = $amountWithdraw;
        $donner->save();

        Log::info('User Assigned to new User for Complete Donation');
        return redirect()->back()->with('message', 'Attachment Successfully Assigned');
        // }
    }


    public function attachmentReq($id, Request $request)
    {
        $validated = $request->validate([
            'donation_id' => 'required',
            'withdraw_id' => 'required',
        ]);
        // Proccess of assignment of attachment to a Withdraw User.
        $donation = donation::find($validated['donation_id']);
        $withdraw = withdraw::find($validated['withdraw_id']);
        // checking if the donation amount is greater than withdraw amount
        $bridge = bridge::where('user_id', $donation->user->id)->where('status', 'Open')->first();
        if ($bridge->total > $bridge->sent) {
            Log::info('This User Need More Donations');
            $leftAmount = $bridge->total - $bridge->sent;
            Log::info($leftAmount . ' Left Amount');
            // checking in database if any withdraw request match with this left amount
            // if ($withdraw->amount < $leftAmount) {
            //     Log::info('Left Amount is Greater then Withdraw Amount');
            //     // checking if attachment already in proccess
            //     $alreadyAttached = attachment::where('donation_id', $donation->id)
            //         ->where('bridge_id', $bridge->id)
            //         ->where('sender', $donation->user->id)
            //         ->where('receiver', $withdraw->user->id)
            //         ->where('status', "Open")
            //         ->first();
            //     if ($alreadyAttached == "") {
            //         $attachment = new attachment();
            //         $attachment->donation_id = $donation->id;
            //         $attachment->bridge_id = $bridge->id;
            //         $attachment->sender = $donation->user->id;
            //         $attachment->receiver = $withdraw->user->id;
            //         $attachment->amount = $withdraw->amount;
            //         $attachment->status = "Open";
            //         $attachment->save();
            //         Log::info('User Assigned to new User for Complete Donation');
            //     } else {
            //         Log::info('Already in Queue');
            //     }
            // }
            if ($withdraw->amount > $leftAmount) {
                Log::info('Withdraw Amount is Greater then Left Amount');
                $alreadyAttached = attachment::where('donation_id', $donation->id)
                    ->where('bridge_id', $bridge->id)
                    ->where('sender', $donation->user->id)
                    ->where('receiver', $withdraw->user->id)
                    ->where('status', "Queue")
                    ->first();
                if ($alreadyAttached == "") {
                    $attachment = new attachment();
                    $attachment->donation_id = $donation->id;
                    $attachment->bridge_id = $bridge->id;
                    $attachment->sender = $donation->user->id;
                    $attachment->receiver = $withdraw->user->id;
                    $attachment->amount = $leftAmount;
                    $attachment->status = "Queue";
                    $attachment->save();
                    $withdraw->amount -= $leftAmount;
                    $withdraw->save();
                    Log::info('User Assigned to new User for Complete Donation');
                } else {
                    Log::info('Already in Queue');
                }
            } elseif ($withdraw->amount == $leftAmount) {
                Log::info('Withdraw Amount is Equal to Left Amount');
                $alreadyAttached = attachment::where('donation_id', $donation->id)
                    ->where('bridge_id', $bridge->id)
                    ->where('sender', $donation->user->id)
                    ->where('receiver', $withdraw->user->id)
                    ->where('status', "Queue")
                    ->first();
                if ($alreadyAttached == "") {
                    $attachment = new attachment();
                    $attachment->donation_id = $donation->id;
                    $attachment->bridge_id = $bridge->id;
                    $attachment->sender = $donation->user->id;
                    $attachment->receiver = $withdraw->user->id;
                    $attachment->amount = $leftAmount;
                    $attachment->status = "Queue";
                    $attachment->save();
                    $withdraw->amount -= $leftAmount;
                    $withdraw->save();
                    Log::info('User Assigned to new User for Complete Donation');
                } else {
                    Log::info('Already in Queue');
                }
            } elseif ($withdraw->amount < $leftAmount) {
                $amountWithdraw = $withdraw->amount;
                $attachment = new attachment();
                $attachment->donation_id = $donation->id;
                $attachment->bridge_id = $bridge->id;
                $attachment->sender = $donation->user->id;
                $attachment->receiver = $withdraw->user->id;
                $attachment->amount = $withdraw->amount;
                $attachment->status = "Queue";
                $attachment->save();
                $withdraw->amount -= $amountWithdraw;
                $withdraw->save();
                Log::info('User Assigned to new User for Complete Donation');
                // storing into donner table
                $donner = new donner();
                $donner->user_id = $donation->user->id;
                $donner->donation_id = $donation->id;
                $donner->receiver_id = $withdraw->user->id;
                $donner->amount = $amountWithdraw;
                $donner->save();
            } else {
                return redirect()->back()->withErrors('Assignment Faild, please Contact Admin');
            }
            $donation->status = "Used";
            $donation->save();
            return redirect()->back()->with('message', 'Attachment Request Successfully Completed');
        }
    }

    public function balanceAdd(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|exists:users',
            'amount' => 'required|numeric',
        ]);
        // find this user
        $user = User::where('email', $validated['email'])->first();
        // inserting a transaction for this user to add balance
        $transaction = new transaction();
        $transaction->user_id = $user->id;
        $transaction->amount = $validated['amount'];
        $transaction->type = "Deposit";
        $transaction->status = "Approved";
        $transaction->sum = "In";
        $transaction->save();
        return redirect()->back()->with('message', 'Balance Added Successfully');
    }


    public function donationAdd(Request $request)
    {
        $validated = $request->validate([
            'plan_id' =>  'required',
            'email' =>  'required|email',
        ]);

        // findd this user email
        $user = User::where('email', $validated['email'])->firstOrFail();
        // checking if this user already active donation
        $userDonation = userPlan::where('user_id', $user->id)->where('status', 'Active')->first();
        if ($userDonation != "") {
            return redirect()->back()->withErrors('This User Already Have Active Plan');
        }
        // inserting this user donation row
        $donation = new donation();
        $donation->user_id = $user->id;
        $donation->plan_id = $validated['plan_id'];
        $donation->status = "Complete";
        $donation->save();

        // activating this user plan
        $userPlan = new userPlan();
        $userPlan->user_id = $user->id;
        $userPlan->plan_id = $validated['plan_id'];
        $userPlan->donation_id = $donation->id;
        $userPlan->status = "Active";
        $userPlan->exp_date = Carbon::now()->addDays(7);
        $userPlan->save();
        return redirect()->back()->with('message', 'Donation Added Successfully');
    }
}
