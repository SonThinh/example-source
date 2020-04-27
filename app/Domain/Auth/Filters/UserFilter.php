<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */


namespace App\Domain\Auth\Filters;

use App\Domain\Support\Filters\Filter;
use App\Traits\CommonFilter;

class UserFilter extends Filter
{
    use CommonFilter;

    /**
     * Filter user by name
     *
     * @param  string  $name
     * @return \App\Builders\Builder
     */
    public function name($name)
    {
        return $this->query->whereLike('name', $name);
    }

    /**
     * Filter user by email
     *
     * @param  string  $email
     * @return \App\Builders\Builder
     */
    public function email($email)
    {
        return $this->query->whereLike('email', $email);
    }
}
