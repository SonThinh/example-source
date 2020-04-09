<?php


namespace App\Domain\Support;

use App\Domain\Support\Traits\HasTransformer;
use App\Http\Controllers\Controller as BaseController;

class ApiController extends BaseController
{
    use HasTransformer;
}
