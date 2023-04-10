<?php


namespace App\Actions\Companies;


use App\Models\Company;
use Illuminate\Support\Arr;

class UpdateCompanyAction
{
    /**
     * @param  Company  $company
     * @param  array  $data
     * @return Company|bool|\Illuminate\Database\Eloquent\Model
     */
    public function execute(Company $company, array $data)
    {
        $company->fill(Arr::except($data, 'contact'));
        $company->save();

        if ($contactData = Arr::get($data, 'contact')) {
            $attributes = [
                'contactable_id' => $company->id,
                'contactable_type' => $company->getMorphClass()
            ];
            $company->contact()->updateOrCreate($attributes, Arr::get($data, 'contact'));
        }

        return $company;
    }
}
