<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{

    /**
     * Auth and get token
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $data = [];
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return $this->returnJson($data, 1000, 'Invalid credentials.');
            }
        } catch (JWTException $e) {
            return $this->returnJson($data, 1001, 'System error,try again later.');
        }

        $data = ['token' => $token];
        return $this->returnJson($data);
    }

    /**
     * Get user info by token
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function info(Request $request)
    {
        $token = $request->get('token');
        $data = [];
        try {
            JWTAuth::setToken($token);
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return $this->returnJson($data, 1002, 'User not found.');
            }
        }catch (TokenExpiredException $e) {
            return $this->returnJson($data, 1003, 'Token expired.');
        }catch (TokenInvalidException $e) {
            return $this->returnJson($data, 1004, 'Invalid token.');
        }

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