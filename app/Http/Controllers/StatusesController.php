<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;

class StatusesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['store', 'destroy']]);
    }

    public function store(User $user, Request $request)
    {
        Status::create([
            'user_id' => $user->id,
            'content' => $request->content
        ]);
        session()->flash('success', 'You have created a new post!');
        return back();
    }
}
