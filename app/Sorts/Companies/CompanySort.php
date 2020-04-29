<?php


namespace App\Sorts\Companies;

use App\Sorts\Sort;
use App\Traits\CommonSort;

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
