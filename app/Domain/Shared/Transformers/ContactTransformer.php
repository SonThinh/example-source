<?php


namespace App\Domain\Shared\Transformers;

use App\Domain\Auth\Transformers\UserTransformer;
use App\Domain\Shared\Models\Contact;
use Flugg\Responder\Transformers\Transformer;

class ContactTransformer extends Transformer
{
    /**
     * List of available relations.
     *
     * @var string[]
     */
    protected $relations = [
        'user' => UserTransformer::class
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
     * @param Contact $contact
     * @return array
     */
    public function transform(Contact $contact): array
    {
        return [
            'id' => (string)$contact->id,
            'postcode' => (string)$contact->postcode,
            'city' => (string)$contact->city,
            'free_dial' => (string)$contact->free_dial,
            'tel' => (string)$contact->tel,
            'fax' => (string)$contact->fax,
            'email' => (string)$contact->email,
            'website' => (string)$contact->website,
            'address' => (string)$contact->address,
            'created_at' => $contact->created_at,
            'updated_at' => $contact->updated_at
        ];
    }
}
