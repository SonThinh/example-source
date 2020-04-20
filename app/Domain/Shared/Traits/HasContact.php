<?php


namespace App\Domain\Shared\Traits;

use App\Domain\Shared\Models\Contact;
use Illuminate\Database\Eloquent\Model;

trait HasContact
{
    public static function bootHasContacts()
    {
        // Delete contact belongs to model before model deleted
        static::deleting(function (Model $model) {
            $model->contact()->delete();
        });
    }

    /**
     * Get the contact belongs to model
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function contact()
    {
        return $this->morphOne(Contact::class, 'contactable');
    }
}
