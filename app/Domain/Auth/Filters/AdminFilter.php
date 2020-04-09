<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */


namespace App\Domain\Auth\Filters;

use App\Domain\Support\Filters\Filter;

class AdminFilter extends Filter
{
    /**
     * Filter admin by name
     *
     * @param string $name
     * @return \App\Domain\Support\Builder
     */
    public function name($name)
    {
        return $this->query->whereLike('name', $name);
    }

    /**
     * Filter admin by username
     *
     * @param string $username
     * @return \App\Domain\Support\Builder
     */
    public function username($username)
    {
        return $this->query->whereLike('username', $username);
    }
}
