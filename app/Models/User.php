<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar', 'created_at', 'update_at', 'activated'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'activation_token'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(
            function ($user) {
                $user->activation_token = Str::random(10);
            }
        );
    }

    public function statuses()
    {
        return  $this->hasMany(Status::class);
    }

    public function followers()
    {
        return  $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }
    public function followings()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    public function isFollowing(User $user)
    {
        $currentUser = Auth::user();
        return $currentUser->followings->contains($user->id);
    }

    public function follow(User $user)
    {
        $currentUser = Auth::user();
        $currentUser->followings()->syncWithoutDetaching($user);
    }

    public function unfollow(User $user)
    {
        $currentUser = Auth::user();
        $currentUser->followings()->detach($user);
    }
}
