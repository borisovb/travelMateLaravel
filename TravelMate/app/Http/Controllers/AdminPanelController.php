<?php

namespace App\Http\Controllers;

use App\Story;
use App\User;
use Validator;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class AdminPanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('approve', User::class);

        $storiesApproved = DB::table("stories")->where('approved', '=', '1')->orderBy('created_at', 'DSC')->simplePaginate(5);
        $storiesUnapproved = DB::table("stories")->where('approved', '=', '0')->orderBy('created_at', 'DSC')->get();

        return view('admin.index', ['storiesApproved' => $storiesApproved, 'storiesUnapproved' => $storiesUnapproved]);
    }

    public function approveStory($id)
    {
        $this->authorize('approve', User::class);

        $story = DB::table('stories')->where('id', '=', $id)->update(['approved' => 1]);

        return back();
    }
    public function manageUsers()
    {
        $this->authorize('manageUsers', User::class);

        $users = DB::table("users")->paginate(5);
        return view('admin.users', compact('users'));
    }
    public function editUser($id)
    {
        $this->authorize('manageUsers', User::class);

        $user = User::find($id);

        return view('admin.editUser', compact('user'));
    }
    public function updateUser(Request $request, $id)
    {
        $this->authorize('manageUsers', User::class);

        $user = User::find($id);

        $validatedRequest = request()->validate([
            'name' => ['required', 'min:4'],
            'email' => ['required', 'min:10']
        ]);

        if ($request['isAdmin']) {
            $validatedRequest['isAdmin'] = 1;
        } else {
            $validatedRequest['isAdmin'] = 0;
        }
        if ($request['isEditor']) {
            $validatedRequest['isEditor'] = 1;
        } else {
            $validatedRequest['isEditor'] = 0;
        }

        $user->update($validatedRequest);
        return redirect('/admin/users');
    }
    public function deleteUser($id)
    {
        $this->authorize('manageUsers', User::class);

        $user = User::find($id);
        $user->delete();
        return redirect('/admin/users');
    }
}
