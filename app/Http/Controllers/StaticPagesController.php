<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaticPagesController extends Controller
{
    public function index()

    {
        $statuses = Status::orderBy('created_at', 'desc')->paginate(20);
        return view('static_pages.index', compact('statuses'));
    }
    public function help()
    {
        return view('static_pages.help');
    }

    public function about()
    {
        return view('static_pages.about');
    }
}
