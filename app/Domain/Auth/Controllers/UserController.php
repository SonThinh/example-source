<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */


namespace App\Domain\Auth\Controllers;

use App\Domain\Auth\Filters\UserFilter;
use App\Domain\Auth\Models\User;
use App\Domain\Auth\Requests\CreateUserRequest;
use App\Domain\Auth\Requests\UpdateUserRequest;
use App\Domain\Auth\Transformers\UserTransformer;
use App\Domain\Support\ApiController;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param UserFilter $userFilter
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function index(Request $request, UserFilter $userFilter)
    {
        return $this->httpOK(User::query()->filter($userFilter)->paginate(), UserTransformer::class);
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
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function store(CreateUserRequest $request)
    {
        $admin = User::create($request->validated());
        return $this->httpCreated($admin, UserTransformer::class);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateUserRequest $request
     * @param User $user
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated());
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