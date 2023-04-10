<?php

if (!function_exists('jwt_guard')) {
    /**
     * @param string $name
     * @return \Illuminate\Contracts\Auth\Guard|\Illuminate\Contracts\Auth\StatefulGuard|\Tymon\JWTAuth\JWTGuard
     */
    function jwt_guard(string $name = null)
    {
        return auth($name);
    }
}
