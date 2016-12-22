<?php

namespace App\Http\Controllers\OApi;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Get user info
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function info(Request $request)
    {
        $user = Auth::user();
        return $this->returnJson($user);
    }

    /**
     * Get all users
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function all(Request $request)
    {
        $data = User::paginate();
        return $this->returnJson($data);
    }
}