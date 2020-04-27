<?php


namespace App\Models;

use App\Domain\Shared\Builders\ContactBuilder;
use App\Domain\Support\Traits\OverridesBuilder;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use OverridesBuilder;

    public function provideCustomBuilder()
    {
        return ContactBuilder::class;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'postcode', 'city', 'free_dial', 'tel', 'fax', 'email', 'website', 'address',
        'contactable_id', 'contactable_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        //
    ];

    // ======================================================================
    // Relationships
    // ======================================================================

    /**
     * Get the owning contactable model.
     */
    public function contactable()
    {
        return $this->morphTo();
    }
}
