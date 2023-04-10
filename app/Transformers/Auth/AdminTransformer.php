<?php


namespace App\Transformers\Auth;


use App\Models\Admin;
use Flugg\Responder\Transformers\Transformer;

class AdminTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [
        'roles' => RoleTransformer::class,
        'permissions' => PermissionTransformer::class,
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
     * @param Admin $admin
     * @return array
     */
    public function transform(Admin $admin): array
    {
        return [
            'id' => (string) $admin->id,
            'name' => (string) $admin->name,
            'username' => (string) $admin->username,
            'created_at' => $admin->created_at->toIso8601ZuluString(),
            'updated_at' => $admin->updated_at,
            'deleted_at' => $admin->deleted_at,
        ];
    }
}
