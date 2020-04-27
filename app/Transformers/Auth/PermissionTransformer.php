<?php


namespace App\Transformers\Auth;


use App\Models\Permission;
use Flugg\Responder\Transformers\Transformer;

class PermissionTransformer extends Transformer
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
     * @param Permission $permission
     * @return array
     */
    public function transform(Permission $permission): array
    {
        return [
            'id' => (string)$permission->id,
            'name' => (string)$permission->name,
            'display_name' => (string)$permission->display_name,
            'description' => (string)$permission->description
        ];
    }
}
