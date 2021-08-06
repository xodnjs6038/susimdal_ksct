<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function render($request, Exception $exception) {
        if ($exception instanceof ModelNotFoundException) {
            return response()->json([
                'error' => 'Resource not found!'
            ], 404);
        }

        return parent::render($request, $exception);
    }
}