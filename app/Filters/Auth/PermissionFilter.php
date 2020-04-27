<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */


namespace App\Filters\Auth;

use App\Filters\Filter;

class PermissionFilter extends Filter
{
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
}
