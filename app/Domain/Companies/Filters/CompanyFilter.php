<?php


namespace App\Domain\Companies\Filters;


use App\Domain\Support\Filters\Filter;

class CompanyFilter extends Filter
{
    /**
     * Filter company by name
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
     * @param string $code
     * @return \App\Domain\Support\Builder
     */
    public function code($code)
    {
        return $this->query->whereLike('code', $code);
    }
}
