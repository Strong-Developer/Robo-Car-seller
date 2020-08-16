<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public $api = 'f07862522e9585ffd7ca6a6138ec262480b0d91f';
    public $host = 'https://dev.robonegotiator.com';
    public $aihost = 'https://ai.robonegotiator.com';
}
