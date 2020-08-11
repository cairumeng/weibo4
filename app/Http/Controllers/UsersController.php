<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Illuminate\Foundation\Auth\User;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['create', 'store', 'show']]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:56',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
    }
}
