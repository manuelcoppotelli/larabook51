<?php

namespace Larabook\Http\Controllers;

class PagesController extends Controller
{
    /**
     * Display the home page.
     *
     * @return Response
     */
    public function home()
    {
        return view('pages.home');
    }
}
