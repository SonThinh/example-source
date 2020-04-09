<?php


namespace App\Domain\Auth\Transformers;


use App\Domain\Auth\Models\Admin;
use Flugg\Responder\Transformers\Transformer;

class AdminTransformer extends Transformer
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
