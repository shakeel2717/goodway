<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userPlan extends Model
{
    use HasFactory;

    // relationship with plan
    public function plan()
    {
        return $this->belongsTo(plan::class);
    }


    public function donation()
    {
        return $this->belongsTo(donation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
