<?php


namespace App\Domain\Auth\Enums;


use BenSampo\Enum\Enum;

final class GuardType extends Enum
{
    const ADMIN = 'admin';
    const USER = 'user';
}
