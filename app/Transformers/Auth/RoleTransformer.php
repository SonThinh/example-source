<?php


namespace App\Transformers\Auth;


use App\Models\Role;
use App\Transformers\Auth\PermissionTransformer;
use Flugg\Responder\Transformers\Transformer;

class RoleTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [
        'permissions' => PermissionTransformer::class
    ];

    /**
     * A list of autoloaded default relations.
     *
     * @var array
     */
    protected $load = [];

    /**
     * Transform the model.
     *
     * @param Role $role
     * @return array
     */
    public function transform(Role $role): array
    {
        return [
            'id' => (string)$role->id,
            'name' => (string)$role->name,
            'display_name' => (string)$role->display_name,
            'description' => (string)$role->description
        ];
    }
}
