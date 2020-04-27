<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */


namespace App\Domain\Auth\Filters;

use App\Domain\Support\Filters\Filter;
use App\Domain\Support\Traits\CommonFilter;

class RoleFilter extends Filter
{
    use CommonFilter;

    /**
     * Filter role by name
     *
     * @param  string  $name
     * @return \App\Domain\Support\Builder
     */
    public function name($name)
    {
        return $this->query->whereLike('name', $name);
    }

    /**
     * Filter role by display name
     *
     * @param  string  $email
     * @return \App\Domain\Support\Builder
     */
    public function display_name($email)
    {
        return $this->query->whereLike('display_name', $email);
    }
}