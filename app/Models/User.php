<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;

    protected $fillable = [
        'fname',
        'lname',
        'username',
        'email',
        'password',
        'refer',
    ];


    public function wallet()
    {
        return $this->hasOne(wallet::class);
    }


    public function donation()
    {
        return $this->hasMany(donation::class);
    }


    public function withraw()
    {
        return $this->hasMany(withraw::class);
    }


    public function plan()
    {
        return $this->hasOne(plan::class);
    }
}
