<?php
/** @noinspection PhpFullyQualifiedNameUsageInspection */


namespace App\Domain\Auth\Filters;

use App\Domain\Support\Filters\Filter;

class UserFilter extends Filter
{
    /**
     * Filter user by name
     *
     * @param string $name
     * @return \App\Domain\Support\Builder
     */
    public function name($name)
    {
        return $this->query->whereLike('name', $name);
    }

    /**
     * Filter user by email
     *
     * @param string $email
     * @return \App\Domain\Support\Builder
     */
    public function email($email)
    {
        return $this->query->whereLike('email', $email);
    }
}
