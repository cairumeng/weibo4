<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $fillable = [
        'user_id', 'follower_id',  'created_at', 'update_at'
    ];
}
