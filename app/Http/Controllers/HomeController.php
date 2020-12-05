<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }

    public function profile()
    {
        $currentUser = Auth::user();

        $users = User::where('id', '!=', Auth::id())
            ->withTrashed()
            ->paginate(3);

        return view('profile', compact('currentUser', 'users'));
    }
}
