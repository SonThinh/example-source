<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */


namespace App\Filters\Auth;

use App\Filters\Filter;
use App\Traits\CommonFilter;

class RoleFilter extends Filter
{
    use CommonFilter;

    /**
     * Filter role by name
     *
     * @param  string  $name
     * @return \App\Builders\Builder
     */
    public function name($name)
    {
        return $this->query->whereLike('name', $name);
    }

    /**
     * Filter role by display name
     *
     * @param  string  $email
     * @return \App\Builders\Builder
     */
    public function display_name($email)
    {
        return $this->query->whereLike('display_name', $email);
    }
}
