<?php

namespace App\Models;

use App\Domain\Auth\Builders\UserBuilder;
use App\Domain\Shared\Traits\HasContact;
use App\Domain\Support\Interfaces\AuthInterface;
use App\Domain\Support\Traits\HasUuid;
use App\Domain\Support\Traits\OverridesBuilder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject, AuthInterface
{
    use Notifiable;
    use HasUuid;
    use HasRoles;
    use HasContact;
    use OverridesBuilder;

    public function isAdmin(): bool
    {
        return false;
    }

    public function provideCustomBuilder()
    {
        return UserBuilder::class;
    }

    /**
     * @inheritDoc
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * @inheritDoc
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return 'email';
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->attributes['password'];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'gender', 'birthday', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
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

    public function setPasswordAttribute($value)
    {
        // Hash password on create new record
        $this->attributes['password'] = bcrypt($value);
    }


    // ======================================================================
    // Relationships
    // ======================================================================
}
