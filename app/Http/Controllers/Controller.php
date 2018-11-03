<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    //除了index都不能访问
 /*   public function __construct()
    {
        $this->middleware('auth', [
            'except'=>['index'],
        ]);
    }*/

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
