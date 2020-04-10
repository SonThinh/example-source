<?php


namespace App\Domain\Companies\Action;


use App\Domain\Companies\Models\Company;

class UpdateConpanyAction
{
    /**
     * @param Company $post
     * @param array $data
     * @return Company|bool|\Illuminate\Database\Eloquent\Model
     */
    public function execute(Company $company, array $data)
    {
        $company->fill(Arr::except($data, 'contact'));
        $company->save();

        $contact = $company->contact;
        $contact->fill(Arr::get($data, 'contact'));
        $contact->save();
        return $contact;
    }
}
