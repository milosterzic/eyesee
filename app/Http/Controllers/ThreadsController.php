<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\View\View;
use App\Http\Requests\StoreThread;
use App\Http\Requests\UpdateThread;
use Illuminate\Support\Facades\Auth;

class ThreadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index() : View
    {
        $threads = Thread::all();

        return view('welcome', ['threads' => $threads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create() : View
    {
        return view('threads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StoreThread $request
     * @return mixed
     */
    public function store(StoreThread $request)
    {
        $thread = new Thread();

        $thread->title = $request->get('title');
        $thread->text = $request->get('text');
        $thread->user_id = Auth::user()->id;
        $thread->is_posted = 0;

        $thread->save();

        return redirect(route('welcome'))->with('message', 'Thread successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show(int $id) : View
    {
        $thread = Thread::findOrFail($id);

        return view('threads.show', ['thread' => $thread]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function edit(int $id) : View
    {
        $thread = Thread::findOrFail($id);

        if (Auth::user()->canEdit($thread->id)) {
            return view('threads.edit', ['thread' => $thread]);
        }

        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateThread  $request
     * @param  int  $id
     * @return mixed
     */
    public function update(UpdateThread $request, $id)
    {
        $thread = Thread::find($id);

        $thread->title = $request->get('title');
        $thread->text = $request->get('text');

        $thread->save();

        return redirect(route('welcome'))->with('message', 'Thread successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return mixed
     */
    public function destroy(int $id)
    {
        $thread = Thread::findOrFail($id);

        if (Auth::user()->isOwner($thread->id)) {
            $thread->delete();

            return redirect(route('welcome'))->with('message', 'Thread successfully deleted!');
        }

        return abort(404);
    }
}
