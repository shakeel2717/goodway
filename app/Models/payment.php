<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'title',
        'number',
        'mobi',
        'easy',
        'omni',
    ];


    protected static function booted()
    {
        static::creating(function ($product) {
            $product->user_id = session('user')->id;
        });
    }
}
