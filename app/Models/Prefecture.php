<?php


namespace App\Models;


use App\Domain\Support\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Prefecture extends Model
{
    use HasUuid;

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Model $model) {
            $model->prefecture_code = (string)Str::random(8) . '_' . time();
        });
    }

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
    protected $fillable = ['display_name', 'display_order'];
}
