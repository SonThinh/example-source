<?php

namespace App\Models;

use App\Domain\Shared\Builders\PostBuilder;
use App\Models\Post;
use Illuminate\Database\Eloquent\Model;

class DeliveryTarget extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['post_id', 'prefecture_id', 'company_id', 'category_id'];

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

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}
