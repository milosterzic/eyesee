<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\StoreComment;
use App\Http\Requests\UpdateComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CommentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreComment  $request
     * @return RedirectResponse
     */
    public function store(StoreComment $request) : RedirectResponse
    {
        $commentable = 'App\\' . ucfirst($request->get('commentable_type'));
        $commentable = $commentable::findOrFail($request->get('commentable_id'));

        $comment = new Comment();

        $comment->text = $request->get('comment');
        $comment->user_id = Auth::user()->id;

        $commentable->comments()->save($comment);

        return redirect()->back()->with('message', 'Comment successfully posted! It will appear after the approval of the thread owner.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateComment  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(UpdateComment $request, int $id) : RedirectResponse
    {
        $comment = Comment::findOrFail($id);

        $comment->approve()->save();

        return redirect()->back()->with('message', 'Comment successfully approved!');
    }
}
