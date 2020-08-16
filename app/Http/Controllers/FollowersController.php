<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['store', 'destroy']);
    }

    public function store(User $user)
    {
        $this->authorize('follow', $user);
        Auth::user()->follow($user);
        session()->flash('success', 'You have folllowed ' . $user->name);
        return back();
    }
    public function destroy(User $user)
    {
        $this->authorize('follow', $user);
        Auth::user()->unfollow($user);
        session()->flash('success', 'You have unfolllowed ' . $user->name);
        return back();
    }
}
