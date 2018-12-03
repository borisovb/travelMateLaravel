<?php

namespace App\Http\Controllers;

use App\Story;
use Validator;
use Auth;
use Illuminate\Http\Request;
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
        $stories = DB::table("stories")->orderBy('created_at', 'DSC')->get();

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
        $validatedRequest = request()->validate([
            'title' => ['required', 'min:4'],
            'content' => ['required', 'min:10']
        ]);

        $validatedRequest['author_id'] = auth()->id();

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
        return view('story', ['story' => $story]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
        abort_unless($story->author_id == auth()->id(), 403);
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
        abort_unless($story->author_id == auth()->id(), 403);

        $validatedRequest = request()->validate([
            'title' => ['required', 'min:4'],
            'content' => ['required', 'min:10']
        ]);

        $story->update($validatedRequest);
        return redirect('/stories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        abort_unless($story->author_id == auth()->id(), 403);
        $story->delete();
        return redirect('/stories');
    }
}
