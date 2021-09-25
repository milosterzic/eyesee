<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\StoreComment;
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

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        //
    }
}
