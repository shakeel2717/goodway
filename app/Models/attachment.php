<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class attachment extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(user::class);
    }


    public function donation()
    {
        return $this->belongsTo(donation::class);
    }


    public function plan()
    {
        return $this->belongsTo(plan::class);
    }
    
}
