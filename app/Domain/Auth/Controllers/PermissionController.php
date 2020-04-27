<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */


namespace App\Domain\Auth\Controllers;

use App\Filters\Auth\PermissionFilter;
use App\Models\Permission;
use App\Sorts\Auth\PermissionSort;
use App\Transformers\Auth\PermissionTransformer;
use App\Domain\Support\ApiController;
use Illuminate\Http\Request;

class PermissionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param PermissionFilter $permissionFilter
     * @param PermissionSort $permissionSort
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request, PermissionFilter $permissionFilter, PermissionSort $permissionSort)
    {
        return $this->httpOK(Permission::query()->filter($permissionFilter)->sortBy($permissionSort)->get(), PermissionTransformer::class);
    }
}
