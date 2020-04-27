<?php


namespace App\Domain\Auth\Actions;

use App\Models\User;
use Illuminate\Support\Arr;

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

        if ($contactData = Arr::get($data, 'contact')) {
            $user->contact()->create(Arr::get($data, 'contact'));
        }

        return $user;
    }
}
