<?php


namespace App\Domain\Auth\Actions;


use App\Domain\Auth\Models\User;
use Illuminate\Support\Arr;

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

        if ($contactData = Arr::get($data, 'contact')) {
            $user->contact()->updateOrCreate(Arr::get($data, 'contact'));
        }
        return $user;
    }
}
