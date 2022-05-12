<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'profit',
        'total',
        'duration',
    ];


    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
