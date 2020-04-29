<?php


namespace App\Http\Controllers;

use App\Enums\Auth\GuardType;
use App\Actions\Auth\LoginAction;
use App\Actions\Auth\RefreshTokenAction;
use App\Http\Controllers\ApiController;
use Flugg\Responder\Exceptions\Http\PageNotFoundException;
use Flugg\Responder\Serializers\NoopSerializer;
use Illuminate\Http\Request;

class AuthController extends ApiController
{
    protected $guard;

    public function __construct()
    {
        $this->middleware('auth:admin,user')->except('login', 'refresh');
    }

    /**
     * @param Request $request
     */
    private function checkGuard(Request $request)
    {
        $this->guard = $request->route('guard');
        if (!in_array($this->guard, GuardType::getValues())) {
            throw new PageNotFoundException();
        }
    }

    /**
     * @param Request $request
     * @param LoginAction $action
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request, LoginAction $action)
    {
        $this->checkGuard($request);
        $credentials = $this->validateLogin($request);
        $result = $action->execute($credentials, $this->guard);
        return $this->setSerializer(NoopSerializer::class)->httpCreated($result);
    }


    /**
     * @param Request $request
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $this->checkGuard($request);
        jwt_guard($this->guard)->logout(true);
        return $this->httpNoContent();
    }

    /**
     * @param Request $request
     * @param RefreshTokenAction $action
     * @return \Flugg\Responder\Http\Responses\SuccessResponseBuilder|\Illuminate\Http\JsonResponse
     * @throws \Tymon\JWTAuth\Exceptions\TokenExpiredException
     * @throws \Tymon\JWTAuth\Exceptions\TokenInvalidException
     */
    public function refresh(Request $request, RefreshTokenAction $action)
    {
        $this->checkGuard($request);
        $result = $action->execute($this->guard);
        return $this->setSerializer(NoopSerializer::class)->httpCreated($result);
    }

    /**
     * Get the login field
     *
     * @return string
     */
    public function username()
    {
        if ($this->guard == 'user') {
            return 'email';
        }
        return 'username';
    }

    /**
     * Validate the user login request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     *
     */
    protected function validateLogin(Request $request)
    {
        return $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

}
