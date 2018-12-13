<?php

namespace App\Http\Controllers;

use App\Story;
use App\User;
use Validator;
use Auth;
use Image;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;


class StoryController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = DB::table("stories")->where('approved', '=', '1')->orderBy('created_at', 'DSC')->paginate(5);

        return view('stories', ['stories' => $stories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newStory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $validatedRequest = request()->validate([
            'title' => ['required', 'min:4'],
            'content' => ['required', 'min:10'],
            'image' => ['required', 'file', 'max:2048', 'mimes:jpeg,png,jpg']
        ]);


        $validatedRequest['user_id'] = $user->id;

        $image = $request->file('image');
        $filename=time().'.'.$image->getClientOriginalExtension();
        image::make($image)->resize(1280,720)->save(public_path('uploads\storyImages\\'.$filename));
        image::make($image)->resize(1280,720)->pixelate(12)->save(public_path('uploads\storyImages\p'.$filename));
        $validatedRequest['image'] = $filename;

        if ($user->isAdmin || $user->isEditor) {
            $validatedRequest['approved'] = 1;
        }

        Story::create($validatedRequest);
        return redirect('/stories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        $user = User::find($story->user_id);
        return view('story', ['story' => $story, 'user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
        $this->authorize('manage', $story);

        return view('editStory', compact('story'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Story $story)
    {
        $this->authorize('manage', $story);

        $validatedRequest = request()->validate([
            'title' => ['required', 'min:4'],
            'content' => ['required', 'min:10']
        ]);

        $story->update($validatedRequest);
        return redirect('/stories/' . $story->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        $this->authorize('manage', $story);

        $story->delete();
        return redirect('/stories');
    }
}
