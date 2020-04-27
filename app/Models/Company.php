<?php


namespace App\Models;

use App\Domain\Companies\Builders\CompanyBuilder;
use App\Domain\Shared\Traits\HasContact;
use App\Domain\Support\Traits\HasUuid;
use App\Domain\Support\Traits\OverridesBuilder;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use OverridesBuilder;
    use HasUuid;
    use HasContact;

    public function provideCustomBuilder()
    {
        return CompanyBuilder::class;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        //'prefecture_id',
        'code',
        'name',
        'created_by',
        'updated_by',
        'deleted_by',
        'deleted_at',
        'updated_at',
        'created_at'
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
}
