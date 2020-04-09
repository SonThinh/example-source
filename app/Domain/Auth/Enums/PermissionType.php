<?php


namespace App\Domain\Auth\Enums;


use BenSampo\Enum\Enum;

final class PermissionType extends Enum
{
    const VIEW_ROLE = 'view-role';
    const CREATE_ROLE = 'create-role';
    const UPDATE_ROLE = 'update-role';
    const DELETE_ROLE = 'delete-role';

    const VIEW_ADMIN = 'view-admin';
    const CREATE_ADMIN = 'create-admin';
    const UPDATE_ADMIN = 'update-admin';
    const DELETE_ADMIN = 'delete-admin';

    const VIEW_USER = 'view-user';
    const CREATE_USER = 'create-user';
    const UPDATE_USER = 'update-user';
    const DELETE_USER = 'delete-user';
}
