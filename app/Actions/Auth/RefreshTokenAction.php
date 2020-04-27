<?php


namespace App\Actions\Auth;


use Illuminate\Support\Carbon;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class RefreshTokenAction
{
    /**
     * @param string|null $guard
     * @return array
     *
     * @throws TokenExpiredException|TokenInvalidException
     */
    public function execute(string $guard = null)
    {
        try {
            $token = jwt_guard($guard)->refresh(true);
            jwt_guard($guard)->setToken($token);
        } catch (TokenExpiredException $exception) {
            throw new BadRequestHttpException('Token Expired');
        } catch (TokenInvalidException $exception) {
            throw new BadRequestHttpException('Token Invalid');
        }
        return [
            'token' => $token,
            'exp' => Carbon::parse(
                jwt_guard($guard)->getPayload()->get('exp')
            )
        ];
    }
}
