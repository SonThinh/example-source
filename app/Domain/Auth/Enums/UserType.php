<?php


namespace App\Domain\Auth\Enums;


use BenSampo\Enum\Enum;

final class UserType extends Enum
{
    public const SUPER_ADMIN = 'super-admin';
    public const ADMIN = 'admin';
    public const USER = 'user';
}
