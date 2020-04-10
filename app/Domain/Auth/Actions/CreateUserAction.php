<?php


namespace App\Domain\Auth\Actions;

use App\Domain\Auth\Models\User;

class CreateUserAction
{
    /**
     * @param array $data
     * @return User|\Illuminate\Database\Eloquent\Model
     * @throws \Throwable
     */
    public function execute(array $data)
    {
        $user = new User();
        $user->fill(Arr::except($data, 'contact'));
        $user->save();

        $contact = new Contact();
        $contact->fill(Arr::only($data, 'contact'));
        $user->contact()->save($contact);

        return $user;
    }
}
