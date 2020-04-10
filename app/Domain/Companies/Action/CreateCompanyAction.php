<?php


namespace App\Domain\Companies\Action;

use App\Domain\Companies\Models\Company;
use App\Domain\Shared\Models\Contact;
use Illuminate\Support\Arr;

class CreateCompanyAction
{
    /**
     * @param array $data
     * @return Company|\Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function execute(array $data)
    {
        $company = new Company();
        $company->fill(Arr::except($data, 'contact'));
        $company->save();

        $contact = new Contact();
        $contact->fill(Arr::only($data, 'contact'));
        $company->contact()->save($contact);

        return $company;
    }
}
