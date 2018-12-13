<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;
use App\User;
use Image;

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
        $stories = DB::table('stories')->where('user_id', '=', auth()->id())->orderBy('created_at', 'DSC')->simplePaginate(5);
        // $stories = User::find(auth()->id())->stories;

        return view('dashboard')->with('user', $user)->with('stories', $stories);
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

    public function updateUserAvatar(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $request->validate([
                'avatar' => 'required|file|max:1024|mimes:jpeg,png,jpg',
            ]);
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/' . $filename));
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }

        return back();
    }

    public function showProfile($id)
    {
        $user =  User::findOrFail($id);
        return view('profile', compact('user'));
    }
}
