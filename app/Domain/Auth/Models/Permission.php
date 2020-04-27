<?php

namespace App\Domain\Auth\Models;

use App\Builders\Auth\PermissionBuilder;
use App\Traits\OverridesBuilder;
use Spatie\Permission\Models\Permission as BasePermission;

class Permission extends BasePermission
{
    use OverridesBuilder;

    public function provideCustomBuilder()
    {
        return PermissionBuilder::class;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'guard_name', 'name', 'display_name', 'description'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        //
    ];
}
