<?php

namespace App\Http\Controllers;

use App\Models\donation;
use App\Models\transaction;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function donations()
    {
        $donations = donation::where('user_id', session('user')->id)->get();
        return view('dashboard.history.donations', compact('donations'));
    }

    public function withdraws()
    {
        $withdraws = transaction::where('user_id', session('user')->id)->where('type','Withdraw')->get();
        return view('dashboard.history.withdraws', compact('withdraws'));
    }

    public function profits()
    {
        $profits = transaction::where('user_id', session('user')->id)->where('type','Profit')->get();
        return view('dashboard.history.profits', compact('profits'));
    }
}
