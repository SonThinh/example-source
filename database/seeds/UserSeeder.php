<?php

use App\Domain\Auth\Models\User;
use App\Domain\Shared\Models\Contact;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create()->each(function (User $user) {
            $contact = factory(Contact::class)->make();
            $user->contact()->save($contact);
            $user->save();
        });
    }
}
