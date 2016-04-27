<?php

namespace Larabook\Http\Controllers;

use Illuminate\Http\Request;

use Larabook\Http\Requests;
use Larabook\Http\Controllers\Controller;
use Larabook\Users\UserRepository;

class UsersController extends Controller
{

    protected $userRepository;

    function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->userRepository->getPaginated();

        return view('users.index')->withUsers($users);
    }

    public function show($username)
    {
        $user = $this->userRepository->findByUsername($username);

        return view('users.show')->withUser($user);
    }
}
