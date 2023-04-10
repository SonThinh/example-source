<?php


namespace App\Http\Controllers;

use App\Models\Prefecture;
use App\Transformers\Shared\PrefectureTransformer;
use Illuminate\Http\Request;

class PrefectureController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        return $this->httpOK(Prefecture::all(), PrefectureTransformer::class);
    }
}
