<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\attachment;
use App\Models\bridge;
use App\Models\commission;
use App\Models\donation;
use App\Models\plan;
use App\Models\transaction;
use App\Models\user;
use App\Models\userPlan;
use App\Models\withdraw;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attachment = attachment::all();
        return view('dashboard.attachment.index', [
            'attachments' => $attachment,
        ]);
    }


    public function attatchmentReq(Request $request)
    {
        $validated = $request->validate([
            'attachment_id' => 'required',
        ]);
        $attachment = attachment::find($validated['attachment_id']);
        $attachment->status = 'Complete';
        $attachment->save();
        // getting the bridge transaction
        $bridge = bridge::find($attachment->bridge_id);
        $bridge->sent += $attachment->amount;

        $withdraw = transaction::where('user_id', session('user')->id)->where('type', 'Withdraw')->where('status', 'Pending')->first();
        if ($attachment->amount == $withdraw->amount) {
            $withdrawTransaction = transaction::where('user_id', session('user')->id)->where('type', 'Withdraw')->where('status', 'Pending')->first();
            $withdrawTransaction->status = 'Approved';
            $withdrawTransaction->save();
            // updating the status of withdraw request
            $withdraw = withdraw::where('user_id', session('user')->id)->where('status', 'Pending')->delete();
            // updating the donation status as a Complete
            $donation = donation::find($attachment->donation_id);
            if (($donation->plan->price - $donation->split) > $attachment->amount) {
                $donation->status = "Pending";
                $donation->split = $donation->plan->price - $attachment->amount;
                $donation->save();
            } else {
                if ($bridge->sent == $bridge->total) {
                    $donation->status = "Complete";
                    $donation->split = 0;
                    $donation->save();
                    $bridge->status = "Complete";
                }
                // activate this user plan in database
                $userPlan = new userPlan();
                $userPlan->user_id = $donation->user_id;
                $userPlan->plan_id = $donation->plan_id;
                $userPlan->donation_id = $donation->id;
                $planDetail = plan::find($donation->plan_id);
                $userPlan->status = "Active";
                $userPlan->exp_date = now()->addDays($planDetail->duration);
                $userPlan->save();
                // checking if this user has valid Refer
                if ($donation->user->refer != "Default") {
                    // getting this refer id
                    $refer = user::where('username', $donation->user->refer)->first();
                    // getting current refer profit ratio
                    $admin = admin::first();
                    $planDetail = plan::find($donation->plan_id);
                    $calc = $planDetail->price * $admin->refer / 100;
                    // inserting profit to this user
                    $task = new commission();
                    $task->user_id = $refer->id;
                    $task->status = "Approved";
                    $task->amount = $calc;
                    $task->sum = "In";
                    $task->from_user_id = $donation->user->id;
                    $task->save();
                }
            }
        } else if ($attachment->amount < $withdraw->amount) {
            $withdrawTransaction = transaction::where('user_id', session('user')->id)->where('type', 'Withdraw')->where('status', 'Pending')->first();
            $withdrawTransaction->amount = $withdraw->amount - $attachment->amount;
            $withdrawTransaction->save();
            // inserting new transaction for left amount withdraw
            $task = new transaction();
            $task->user_id = session('user')->id;
            $task->type = "Withdraw";
            $task->amount = $attachment->amount;
            $task->status = "Approved";
            $task->sum = "Out";
            $task->save();
            // updating the donation status as a Complete
            if ($bridge->sent == $bridge->total) {
                $donation = donation::find($attachment->donation_id);
                $donation->status = "Complete";
                $donation->save();
                $bridge->status = "Complete";

                $userPlan = new userPlan();
                $userPlan->user_id = $donation->user_id;
                $userPlan->plan_id = $donation->plan_id;
                $userPlan->donation_id = $donation->id;
                $planDetail = plan::find($donation->plan_id);
                $userPlan->status = "Active";
                $userPlan->exp_date = now()->addDays($planDetail->duration);
                $userPlan->save();
                // checking if this user has valid Refer
                if ($donation->user->refer != "Default") {
                    // getting this refer id
                    $refer = user::where('username', $donation->user->refer)->first();
                    // getting current refer profit ratio
                    $admin = admin::first();
                    $planDetail = plan::find($donation->plan_id);
                    $calc = $planDetail->price * $admin->refer / 100;
                    // inserting profit to this user
                    $task = new commission();
                    $task->user_id = $refer->id;
                    $task->status = "Approved";
                    $task->amount = $calc;
                    $task->sum = "In";
                    $task->from_user_id = $donation->user->id;
                    $task->save();
                }
            }
        }
        $bridge->save();
        // $withdraw->amount -= $attachment->amount;
        // $withdraw->save();
        return redirect()->back()->with('message', 'Your Request Successfully Marked as Complete');
    }


    public function attatchmentSenderReq(Request $request)
    {
        $validated = $request->validate([
            'attachment_id' => 'required',
        ]);
        $attachment = attachment::find($validated['attachment_id']);
        $attachment->status = 'Queue';
        $attachment->save();
        return redirect()->back()->with('message', 'Your Request successfully sent, Please wait until your Payment Confirmed');
    }


    public function create()
    {
        return view('dashboard.attachment.create');
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
        $task = new attachment();
        $task->test = $validated['test'];
        $task->save();
        // return redirect()->back()->withErrors('Wrong Password, Please try again');
        // return redirect()->route('pin.index')->with('message', 'Task Completed Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function show(attachment $attachment)
    {
        return view('dashboard.attachment.index', [
            'attachment' => $attachment,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function edit(attachment $attachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, attachment $attachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(attachment $attachment)
    {
        $task = attachment::find($attachment->id);
        $task->delete();
        // return redirect()->route('pin.index')->with('message', 'Task Completed Successfully');
    }
}
