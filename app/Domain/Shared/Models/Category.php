<?php


namespace App\Domain\Shared\Models;

use App\Domain\Shared\Builders\CategoryBuilder;
use App\Domain\Support\Traits\OverridesBuilder;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use OverridesBuilder;

    public function provideCustomBuilder()
    {
        return CategoryBuilder::class;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category_type', 'display_name', 'display_order'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
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
}
