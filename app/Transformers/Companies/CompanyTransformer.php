<?php


namespace App\Transformers\Companies;


use App\Models\Company;
use App\Transformers\Shared\ContactTransformer;
use Flugg\Responder\Transformers\Transformer;

class CompanyTransformer extends Transformer
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
     * @param Company $company
     * @return array
     */
    public function transform(Company $company): array
    {
        return [
            'id' => (string) $company->id,
            'code' => (string) $company->code,
            'name' => (string) $company->name,
            'created_at' => $company->created_at,
            'updated_at' => $company->updated_at,
            'deleted_at' => $company->deleted_at,
        ];
    }
}
