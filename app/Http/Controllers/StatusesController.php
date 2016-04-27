<?php

namespace Larabook\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Larabook\Http\Requests\PublishStatusRequest;
use Larabook\Jobs\PublishStatusJob;
use Larabook\Statuses\StatusRepository;

class StatusesController extends Controller
{
    /**
     * Create a new statuses controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the statuses.
     *
     * @param StatusRepository $repository
     * @return Response
     */
    public function index(StatusRepository $repository)
    {
        $statuses = $repository->getAllForUser(Auth::user());

        return view('statuses.index', compact('statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created status.
     *
     * @param PublishStatusRequest $request
     * @return Response
     */
    public function store(PublishStatusRequest $request)
    {
        $this->dispatch(new PublishStatusJob($request->get('body'), Auth::user()->id));

        flash()->message('Your status has been updated!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
