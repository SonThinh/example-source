<?php


namespace App\Domain\Auth\Transformers;


use App\Domain\Auth\Models\User;
use App\Domain\Shared\Transformers\ContactTransformer;
use Flugg\Responder\Transformers\Transformer;

class UserTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [
        'contact' => ContactTransformer::class
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
     * @param User $user
     * @return array
     */
    public function transform(User $user): array
    {
        return [
            'id' => (string) $user->id,
            'first_name' => (string) $user->first_name,
            'last_name' => (string) $user->last_name,
            'gender' => (string) $user->gender,
            'birthday' => (string) $user->birthday,
            'email' => (string) $user->email,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
            'deleted_at' => $user->deleted_at,
        ];
    }
}
