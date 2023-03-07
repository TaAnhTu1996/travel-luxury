<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Make your own structure of the response
     * @param $data
     * @param int $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function response($data, $code = 200) {
        if (!isset($data['success'])) $data['success'] = true;
        $data['code'] = $code;
        return response()->json($data, $code);
    }
}
