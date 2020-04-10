<?php


namespace App\Domain\Auth\Actions;


use App\Domain\Auth\Models\User;

class UpdateUserAction
{
    /**
     * @param User $user
     * @param array $data
     * @return User|bool|\Illuminate\Database\Eloquent\Model
     */
    public function execute(User $user, array $data)
    {
        $user->fill(Arr::except($data, 'contact'));
        $user->save();

        $contact = $user->contact;
        $contact->fill(Arr::get($data, 'contact'));
        $contact->save();
        return $contact;
    }
}
