<?php


namespace App\Models;

use App\Domain\Assets\Builders\AssetBuilder;
use App\Models\Post;
use App\Domain\Support\Traits\OverridesBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Asset extends Model
{
    use OverridesBuilder;

    public function provideCustomBuilder()
    {
        return AssetBuilder::class;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'is_public', 'mime_type', 'size', 'disk', 'path', 'additional'
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
        'additional' => 'object'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['url'];

    // ======================================================================
    // Accessors & Mutators
    // ======================================================================

    public function getUrlAttribute()
    {
        $disk = $this->attributes['disk'];
        $path = $this->attributes['path'];
        switch ($disk) {
            case 's3':
                return (string) Storage::disk('s3')->temporaryUrl($path, now()->addDays(5));
            case 'local':
                return (string) config('app.url').'/assets/'.$path.'?'.now()->timestamp;
            default:
                return '';
        }
    }

    // ======================================================================
    // Relationships
    // ======================================================================

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'asset_post');
    }
}
