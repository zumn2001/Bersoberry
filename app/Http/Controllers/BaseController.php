<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function response($message , $data)
    {
        return response()->json([
            'message' => $message,
            'data' => $data,
            'condition' => true
        ] , 200);
    }
}
