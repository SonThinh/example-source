<?php


namespace App\Actions\Auth;


use Flugg\Responder\Exceptions\Http\UnauthenticatedException;
use Illuminate\Support\Carbon;

class LoginAction
{
    /**
     * @param array $credentials
     * @param string|null $guard
     * @return array
     */
    public function execute(array $credentials, string $guard = null): array
    {
        if (!$token = jwt_guard($guard)->attempt($credentials)) {
            throw new UnauthenticatedException();
        }
        jwt_guard($guard)->setToken($token);
        return [
            'token' => $token,
            'exp' => Carbon::parse(jwt_guard($guard)->getPayload()->get('exp'))
        ];
    }
}
