<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class DashboardController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        return view('dashboard', compact('user'));
    }

    public function updateUserDetails()
    {
        $user = Auth::user();
        $this->validate(request(), [
            'description' => 'required|min:6'
        ]);

        $user->description = request('description');

        $user->save();

        return back();
    }
    public function showProfile($id)
    {
        $user =  User::findOrFail($id);
        return view('profile', compact('user'));

    }
}
