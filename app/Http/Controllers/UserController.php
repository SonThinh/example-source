<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */


namespace App\Http\Controllers;

use App\Actions\Auth\CreateUserAction;
use App\Actions\Auth\UpdateUserAction;
use App\Domain\Auth\Filters\UserFilter;
use App\Domain\Auth\Models\User;
use App\Domain\Auth\Requests\CreateUserRequest;
use App\Domain\Auth\Requests\UpdateUserRequest;
use App\Domain\Auth\Sorts\UserSort;
use App\Domain\Auth\Transformers\UserTransformer;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param UserFilter $userFilter
     * @param UserSort $userSort
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request, UserFilter $userFilter, UserSort $userSort)
    {
        return $this->httpOK(User::query()->filter($userFilter)->sortBy($userSort)->paginate(), UserTransformer::class);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param User $user
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function show(Request $request, User $user)
    {
        return $this->httpOK($user, UserTransformer::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateUserRequest $request
     * @param CreateUserAction $action
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function store(CreateUserRequest $request, CreateUserAction $action)
    {
        $user = $action->execute($request->validated());
        return $this->httpCreated($user, UserTransformer::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param User $user
     * @param UpdateUserAction $action
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function update(UpdateUserRequest $request, User $user, UpdateUserAction $action)
    {
        $action->execute($user, $request->validated());
        return $this->httpNoContent();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param User $user
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();
        return $this->httpNoContent();
    }
}
