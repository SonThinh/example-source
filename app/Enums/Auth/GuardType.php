<?php


namespace App\Enums\Auth;


use BenSampo\Enum\Enum;

final class GuardType extends Enum
{
    const ADMIN = 'admin';
    const USER = 'user';
}
