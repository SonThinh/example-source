<?php


namespace App\Filters\Companies;


use App\Filters\Filter;

class CompanyFilter extends Filter
{
    /**
     * Filter company by name
     *
     * @param string $name
     * @return \App\Builders\Builder
     */
    public function name($name)
    {
        return $this->query->whereLike('name', $name);
    }

    /**
     * Filter user by email
     *
     * @param string $code
     * @return \App\Builders\Builder
     */
    public function code($code)
    {
        return $this->query->whereLike('code', $code);
    }
}
