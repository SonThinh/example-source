<?php


namespace App\Domain\Companies\Sorts;

use App\Domain\Support\Sorts\Sort;
use App\Domain\Support\Traits\CommonSort;

class CompanySort extends Sort
{
    use CommonSort;

    public function name($direction)
    {
        return $this->query->orderBy('name', $direction);
    }

    public function code($direction)
    {
        return $this->query->orderBy('code', $direction);
    }
}