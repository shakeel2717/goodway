<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use App\Models\userPlan;
use App\Models\withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class BlockchainController extends Controller
{
    public function index()
    {
        // getting old record whereDate 1 week ago
        $user_plan = userPlan::whereDate('created_at', '<=', now()->subWeek())->where('status', 'Active')->get();
        foreach ($user_plan as $plan) {
            // deactivating this user plan
            $plan->status = "Expired";
            $plan->save();
            // giving back the amount to the user
            $task = new transaction();
            $task->user_id = $plan->user->id;
            $task->type = "Profit";
            $task->amount = $plan->plan->price * 1.5;
            $task->status = "Approved";
            $task->sum = "In";
            $task->save();

            $task = new withdraw();
            $task->user_id = $plan->user->id;
            $task->amount = $plan->plan->price * 1.5;
            $task->status = "Pending";
            $task->save();

            $task = new transaction();
            $task->user_id = $plan->user->id;
            $task->type = "Withdraw";
            $task->amount = $plan->plan->price * 1.5;
            $task->status = "Pending";
            $task->sum = "Out";
            $task->save();
        }
        return redirect()->back()->with('message', 'Blockchain Run Successfully');
    }
}
