<?php


namespace App\Domain\Shared\Models;

use App\Domain\Shared\Builders\CategoryBuilder;
use App\Domain\Support\Traits\OverridesBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use OverridesBuilder;

    public function provideCustomBuilder()
    {
        return CategoryBuilder::class;
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            $model->category_code = (string)Str::random(8) . '_' . time();
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['category_code', 'category_type', 'display_name', 'display_order'];

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
