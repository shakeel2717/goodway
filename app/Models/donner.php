<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donner extends Model
{
    use HasFactory;


    public function donation()
    {
        return $this->belongsTo(donation::class);
    }
}
