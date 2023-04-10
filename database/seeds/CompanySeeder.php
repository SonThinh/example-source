<?php

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Company::class, 25)->create()->each(function (Company $company) {
            $contact = factory(Contact::class)->make();
            $company->contact()->save($contact);
            $company->save();
        });
    }
}
