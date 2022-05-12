<?php

namespace App\Http\Middleware;

use App\Models\attachment;
use App\Models\donation;
use App\Models\pin;
use App\Models\withdraw;
use Closure;
use Illuminate\Support\Facades\Log;

class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {
        if (!$request->session()->exists('user')) {
            return redirect()->route('login');
        }
        
        // getting all attatchment wheredate 24 hour before then now
        $attachments = attachment::where('status','Queue')->where('created_at', '<', now()->subDay())->get();
        foreach ($attachments as $attachment) {
            // updating the withdraw amount 
            $withdraw = withdraw::where('user_id',$attachment->receiver)->where('status','Pending')->first();
            $withdraw->amount += $attachment->amount;
            $withdraw->save();
            // getting donation
            $donation = donation::find($attachment->donation_id);
            $donation->status = 'Pending';
            $donation->save();
            Log::info('Donation Status Pending again in Middleware');
            $attachment->delete();
            Log::info('attachment deleted in Middleware');
        }
        return $next($request);
    }
}