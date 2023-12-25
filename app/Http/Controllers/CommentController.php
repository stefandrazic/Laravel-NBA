<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        $string = strtolower($request->content);
        $forbidenWords = ['hate', 'idiot', 'stupid'];
        foreach ($forbidenWords as $word) {
            if (str_contains($string, $word)) {
                return redirect()->back()->withErrors("You can't use bad words here!");
            }
        }
        $comment = Comment::create([
            'content' => $request->content,
            'team_id' => $request->team_id,
            'user_id' => auth()->id(),
        ]);
        return redirect()->back()->with('status', 'Successfully commented!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
