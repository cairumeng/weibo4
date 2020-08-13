<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\Activation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['create', 'store', 'show', 'activate']]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function activate($token)
    {
        $user = User::where('activation_token', $token)->first();
        if ($user) {
            $user->activated = true;
            $user->activation_token = null;
            $user->save();
            session()->flash('success', 'You have activated your account!');
            Auth::login($user);
        } else {
            session()->flash('danger', 'Your activation code is expired!');
        }

        return redirect()->intended(route('index'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:56',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'avatar' => asset('images/user.png')
        ]);
        session()->flash('success', 'You have created your account, please check your email to activate it!');
        Notification::send($user, new Activation($user));
        return back();
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function uploadAvatar(User $user, Request $request)
    {
        $request->validate(['avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
        $avatar = $request->avatar;
        $avatarName = time() . '.' . $avatar->extension();
        Storage::putFileAS('images/avatars', $avatar, $avatarName);
        $path = Storage::url('images/avatars/' . $avatarName);
        $user->update(['avatar' => $path]);
        return $path;
    }
}
