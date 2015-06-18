<?php

namespace Larabook\Http\Controllers;

use Illuminate\Http\Request;

use Larabook\Http\Requests;
use Larabook\Http\Controllers\Controller;

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
