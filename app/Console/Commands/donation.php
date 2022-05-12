<?php

namespace App\Console\Commands;

use App\Models\attachment;
use App\Models\bridge;
use App\Models\donation as ModelsDonation;
use App\Models\withdraw;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class donation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'donation:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetching the Pending Donation and Pending Withdraw to assing each others';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // getting all pending donations
        $donations = ModelsDonation::where('status', 'pending')->get();
        Log::info('Donation loop Started');
        foreach ($donations as $donation) {
            // getting all pending withdraws
            $withdraws = withdraw::where('status', 'pending')->get();
            Log::info('Withdraw Loop Started');
            foreach ($withdraws as $withdraw) {
                // checking if the donation amount is greater than withdraw amount
                $bridge = bridge::where('user_id', $donation->user->id)->where('status', 'Open')->first();
                if ($bridge->total > $bridge->sent) {
                    Log::info('This User Need More Donations');
                    $leftAmount = $bridge->total - $bridge->sent;
                    Log::info($leftAmount . ' Left Amount');
                    // checking in database if any withdraw request match with this left amount
                    if ($withdraw->amount < $leftAmount) {
                        Log::info('Left Amount is Greater then Withdraw Amount');
                        // checking if attachment already in proccess
                        $alreadyAttached = attachment::where('donation_id', $donation->id)
                            ->where('bridge_id', $bridge->id)
                            ->where('sender', $donation->user->id)
                            ->where('receiver', $withdraw->user->id)
                            ->where('status', "Open")
                            ->first();
                        if ($alreadyAttached == "") {
                            $attachment = new attachment();
                            $attachment->donation_id = $donation->id;
                            $attachment->bridge_id = $bridge->id;
                            $attachment->sender = $donation->user->id;
                            $attachment->receiver = $withdraw->user->id;
                            $attachment->amount = $withdraw->amount;
                            $attachment->status = "Open";
                            $attachment->save();
                            Log::info('User Assigned to new User for Complete Donation');
                        } else {
                            Log::info('Already in Queue');
                        }
                    } elseif ($withdraw->amount > $leftAmount) {
                        Log::info('Withdraw Amount is Greater then Left Amount');
                        $alreadyAttached = attachment::where('donation_id', $donation->id)
                            ->where('bridge_id', $bridge->id)
                            ->where('sender', $donation->user->id)
                            ->where('receiver', $withdraw->user->id)
                            ->where('status', "Open")
                            ->first();
                        if ($alreadyAttached == "") {
                            $attachment = new attachment();
                            $attachment->donation_id = $donation->id;
                            $attachment->bridge_id = $bridge->id;
                            $attachment->sender = $donation->user->id;
                            $attachment->receiver = $withdraw->user->id;
                            $attachment->amount = $leftAmount;
                            $attachment->status = "Open";
                            $attachment->save();
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
                            ->where('status', "Open")
                            ->first();
                        if ($alreadyAttached == "") {
                            $attachment = new attachment();
                            $attachment->donation_id = $donation->id;
                            $attachment->bridge_id = $bridge->id;
                            $attachment->sender = $donation->user->id;
                            $attachment->receiver = $withdraw->user->id;
                            $attachment->amount = $leftAmount;
                            $attachment->status = "Open";
                            $attachment->save();
                            Log::info('User Assigned to new User for Complete Donation');
                        } else {
                            Log::info('Already in Queue');
                        }
                    }
                }
            }
            Log::info('Withdraw Loop Ended');
        }
        Log::info('Donation Loop Ended');
        Log::info('Cron Job Ended');
        return Command::SUCCESS;
    }
}
