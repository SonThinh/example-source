<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */


namespace App\Http\Controllers;

use App\Enums\Auth\GuardType;
use App\Models\Admin;
use App\Models\User;
use App\Transformers\Auth\AdminTransformer;
use App\Transformers\Auth\UserTransformer;
use Flugg\Responder\Exceptions\Http\UnauthenticatedException;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\UserNotDefinedException;

class ProfileController extends ApiController
{
    /**
     * @var null|Admin|User
     */
    private $profile = null;

    public function __construct()
    {
        $this->middleware('auth:admin,user');
    }

    private function checkProfileExist()
    {
        try {
            $this->profile = jwt_guard($this->guard())->userOrFail();
        } catch (UserNotDefinedException $e) {
            throw new UnauthenticatedException();
        }
    }

    /**
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function show()
    {
        $this->checkProfileExist();
        return $this->httpOK($this->profile, $this->transformer());
    }

    /**
     * @param Request $request
     */
    public function update(Request $request)
    {
        $this->checkProfileExist();
        $validatedData = $this->validateProfile($request);
        $this->profile->update($validatedData);
        $this->httpNoContent();
    }

    /**
     * @param Request $request
     * @return array
     */
    protected function validateProfile(Request $request)
    {
        if ($this->guard() == GuardType::USER) {
            return $request->validate($this->userValidationRules());
        } else {
            return $request->validate($this->adminValidationRules());
        }
    }

    protected function adminValidationRules()
    {
        $ignoreId = optional($this->profile)->id;
        return [
            'name' => 'sometimes|string',
            'username' => 'sometimes|email|unique:admins,username,' . $ignoreId,
            'password' => 'sometimes|confirmed',
        ];
    }

    protected function userValidationRules()
    {
        $ignoreId = optional($this->profile)->id;
        return [
            'first_name' => 'sometimes|string',
            'last_name' => 'sometimes|string',
            'gender' => 'sometimes|string',
            'birthday' => 'sometimes|date|date_format:Y-m-d',
            'email' => 'sometimes|email|unique:users,email,' . $ignoreId,
            'password' => 'sometimes|confirmed',
        ];
    }

    /**
     * Receive needed transformer
     * @return string
     */
    protected function transformer()
    {
        if ($this->guard() == GuardType::USER) {
            return UserTransformer::class;
        }
        return AdminTransformer::class;
    }

    /**
     * Receive current guard
     * @return string
     */
    protected function guard()
    {
        if (jwt_guard(GuardType::USER)->check()) {
            return GuardType::USER;
        }
        return GuardType::ADMIN;
    }
}
