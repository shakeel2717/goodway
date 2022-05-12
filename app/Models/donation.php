<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donation extends Model
{
    use HasFactory;


    public function user()
    {
        return $this->belongsTo(user::class);
    }

    public function plan()
    {
        return $this->belongsTo(plan::class);
    }


    public function userPlan()
    {
        return $this->hasOne(userPlan::class);
    }

    public function donner()
    {
        return $this->hasMany(donner::class);
    }
}
