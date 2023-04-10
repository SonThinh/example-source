<?php


namespace App\Actions\Auth;


use App\Models\User;
use Illuminate\Support\Arr;

class UpdateUserAction
{
    /**
     * @param  User  $user
     * @param  array  $data
     * @return User|bool|\Illuminate\Database\Eloquent\Model
     */
    public function execute(User $user, array $data)
    {
        $user->fill(Arr::except($data, 'contact'));
        $user->save();

        if ($contactData = Arr::get($data, 'contact')) {
            $attributes = [
                'contactable_id' => $user->id,
                'contactable_type' => $user->getMorphClass()
            ];
            $user->contact()->updateOrCreate($attributes, Arr::get($data, 'contact'));
        }

        return $user;
    }
}
