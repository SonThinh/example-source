<?php


namespace App\Domain\Auth\Enums;


use BenSampo\Enum\Enum;

final class UserType extends Enum
{
    const SUPER_ADMIN = 'super-admin';
    const ADMIN = 'admin';
    const USER = 'user';
}
