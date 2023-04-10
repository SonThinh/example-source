<?php


namespace App\Enums\Auth;


use BenSampo\Enum\Enum;

final class PermissionType extends Enum
{
    public const VIEW_ROLE = 'view-role';
    public const CREATE_ROLE = 'create-role';
    public const UPDATE_ROLE = 'update-role';
    public const DELETE_ROLE = 'delete-role';

    public const VIEW_ADMIN = 'view-admin';
    public const CREATE_ADMIN = 'create-admin';
    public const UPDATE_ADMIN = 'update-admin';
    public const DELETE_ADMIN = 'delete-admin';

    public const VIEW_USER = 'view-user';
    public const CREATE_USER = 'create-user';
    public const UPDATE_USER = 'update-user';
    public const DELETE_USER = 'delete-user';

    public const VIEW_POST = 'view-post';
    public const CREATE_POST = 'create-post';
    public const UPDATE_POST = 'update-post';
    public const DELETE_POST = 'delete-post';

    public const VIEW_CATEGORY = 'view-category';
    public const CREATE_CATEGORY = 'create-category';
    public const UPDATE_CATEGORY = 'update-category';
    public const DELETE_CATEGORY = 'delete-category';

    public const VIEW_COMPANY = 'view-company';
    public const CREATE_COMPANY = 'create-company';
    public const UPDATE_COMPANY = 'update-company';
    public const DELETE_COMPANY = 'delete-company';
}
