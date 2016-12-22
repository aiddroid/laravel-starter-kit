<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        //$this->middleware('auth:api');
    }

    /**
     * Return json
     * @param array $data
     * @param int $code
     * @param string $message
     * @return \Illuminate\Http\JsonResponse
     */
    public function returnJson($data = [], $code = 0, $message = 'OK')
    {
        $result = [
            'code' => $code,
            'message' => $message,
            'data' => $data,
        ];

        $callback = request('callback');
        return response()->json($result)->setCallback($callback);
    }
}
