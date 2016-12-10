<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Backend\Controller;

class UserController extends Controller
{
    /**
     * list all users
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $users = User::paginate();
        $data = ['users' => $users];

        return view('backend.user.index', $data);
    }
}
