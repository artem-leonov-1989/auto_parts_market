<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Send successful response
     *
     * @param array $data
     * @param int $code
     * @param array $headers
     *
     * @return JsonResponse
     */
    protected function respondSuccess(array $data = [], int $code = 200, array $headers = [])
    {
        return new JsonResponse($data, $code, $headers);
    }

    /**
     * Send unsuccessful response
     *
     * @param string $error
     * @param array $data
     * @param int $code
     * @param array $headers
     *
     * @return JsonResponse
     */
    protected function respondError(string $error, array $data = [], int $code = 400, array $headers = [])
    {
        return new JsonResponse([
                'error' => $error,
            ] + $data, $code, $headers);
    }
}
