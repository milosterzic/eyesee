<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreThread;
use App\Thread;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
