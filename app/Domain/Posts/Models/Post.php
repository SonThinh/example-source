<?php

namespace App\Domain\Posts\Models;


use App\Domain\Assets\Models\Asset;
use App\Builders\Posts\PostBuilder;
use App\Traits\HasUuid;
use App\Traits\OverridesBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    use HasUuid;
    use OverridesBuilder;

    public function provideCustomBuilder()
    {
        return PostBuilder::class;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['post_type', 'title', 'content', 'status', 'display_order', 'publish_from', 'publish_to'];

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
    // Accessors & Mutators
    // ======================================================================


    // ======================================================================
    // Relationships
    // ======================================================================

    public function deliveryTarget()
    {
        return $this->hasOne(DeliveryTarget::class, 'post_id');
    }

    public function assets()
    {
        return $this->belongsToMany(Asset::class, 'asset_post');
    }
}
