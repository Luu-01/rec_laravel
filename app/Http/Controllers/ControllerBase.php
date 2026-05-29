<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Routing\Controller as BaseController;

abstract class ControllerBase extends BaseController
{
    use AuthorizesRequests;
}
