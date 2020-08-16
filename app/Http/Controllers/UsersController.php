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
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    public function uploadAvatar(User $user, Request $request)
    {
        $this->authorize('update', $user);
        $request->validate(['avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
        $avatar = $request->avatar;
        $avatarName = time() . '.' . $avatar->extension();
        Storage::putFileAS('images/avatars', $avatar, $avatarName);
        $path = Storage::url('images/avatars/' . $avatarName);
        $user->update(['avatar' => $path]);
        return $path;
    }

    public function update(User $user, Request $request)
    {
        $this->authorize('update', $user);
        if ($request->password) {
            $request->validate([
                'name' => 'required|max:56',
                'password' => 'required|min:6'
            ]);
            $user->update([
                'name' => $request->name,
                'password' => bcrypt($request->password)
            ]);
        } else {
            $request->validate([
                'name' => 'required|max:56',
            ]);
            $user->update([
                'name' => $request->name,
            ]);
        }
        session()->flash('success', 'You have updated your information!');
        return back();
    }

    public function show(User $user)
    {
        $statuses = $user->statuses()->orderBy('created_at', 'desc')->paginate(10);
        return view('users.show', compact('statuses'));
    }

    public function followers(User $user)
    {
        $followers = $user->followers()->paginate(10);
        return view('users.followers', compact('followers', 'user'));
    }
    public function followings(User $user)
    {
        $followings = $user->followings()->paginate(10);
        return view('users.followings', compact('followings', 'user'));
    }
}
