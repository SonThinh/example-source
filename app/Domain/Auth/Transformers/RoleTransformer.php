<?php


namespace App\Domain\Auth\Transformers;


use App\Domain\Auth\Models\Role;
use Flugg\Responder\Transformers\Transformer;

class RoleTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [];

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
