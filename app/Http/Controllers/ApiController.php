<?php


namespace App\Http\Controllers;

use App\Traits\HasTransformer;
use App\Http\Controllers\Controller as BaseController;

class ApiController extends BaseController
{
    use HasTransformer;
}
