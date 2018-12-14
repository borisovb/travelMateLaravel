<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Story;
use Validator;

class StoryController extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Story::all();

        return $this->sendResponse($stories->toArray(), 'Stories retrieved successfully.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => ['required', 'min:4'],
            'content' => ['required', 'min:10']
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $story = Story::create($input);

        return $this->sendResponse($story->toArray(), 'Story created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $story = Story::find($id);

        if (is_null($story)) {
            return $this->sendError('Story not found.');
        }

        return $this->sendResponse($story->toArray(), 'Story retrieved successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Story $story)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'title' => ['required', 'min:4'],
            'content' => ['required', 'min:10']
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $story->title = $input['title'];
        $stroy->content = $input['content'];
        $story->save();

        return $this->sendResponse($story->toArray(), 'Story updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        $story->delete();

        return $this->sendResponse($story->toArray(), 'Story deleted successfully.');
    }
}
