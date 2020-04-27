<?php


namespace App\Domain\Shared\Filters;

use App\Domain\Support\Filters\Filter;

class CategoryFilter extends Filter
{

    /**
     * Filter contact by website
     *
     * @param string $website
     * @return \App\Builders\Builder
     */
    public function website($website)
    {
        return $this->query->whereStartsWith('website', $website);
    }
}
