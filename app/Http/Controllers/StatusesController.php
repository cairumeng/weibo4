<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['only' => ['store', 'destroy']]);
    }

    public function store(Request $request)
    {
        Status::create([
            'user_id' => Auth::id(),
            'content' => $request->content
        ]);
        session()->flash('success', 'You have created a new post!');
        return back();
    }

    public function destroy(Status $status)
    {
        $this->authorize('destroy', $status);
        $status->delete();
        session()->flash('success', 'You have delete a post!');
        return redirect()->back();
    }
}
