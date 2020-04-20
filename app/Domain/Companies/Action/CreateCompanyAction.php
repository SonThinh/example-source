<?php


namespace App\Domain\Companies\Action;

use App\Domain\Companies\Models\Company;
use Illuminate\Support\Arr;

class CreateCompanyAction
{
    /**
     * @param  array  $data
     * @return Company|\Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function execute(array $data)
    {
        $company = new Company();
        $company->fill(Arr::except($data, 'contact'));
        $company->save();

        if ($contactData = Arr::get($data, 'contact')) {
            $company->contact()->create(Arr::get($data, 'contact'));
        }

        return $company;
    }
}
