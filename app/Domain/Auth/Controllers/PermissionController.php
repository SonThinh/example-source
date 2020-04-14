<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */


namespace App\Domain\Auth\Controllers;

use App\Domain\Auth\Filters\PermissionFilter;
use App\Domain\Auth\Models\Permission;
use App\Domain\Auth\Transformers\PermissionTransformer;
use App\Domain\Support\ApiController;
use Illuminate\Http\Request;

class PermissionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     * @param  PermissionFilter  $permissionFilter
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request, PermissionFilter $permissionFilter)
    {
        return $this->httpOK(Permission::query()->filter($permissionFilter)->get(), PermissionTransformer::class);
    }
}
