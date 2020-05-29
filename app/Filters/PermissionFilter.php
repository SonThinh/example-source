<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */
namespace App\Filters;

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
