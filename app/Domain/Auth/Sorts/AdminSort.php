<?php


namespace App\Domain\Auth\Sorts;


use App\Domain\Support\Sorts\Sort;
use App\Domain\Support\Traits\CommonSort;

class AdminSort extends Sort
{
    use CommonSort;

    public function name($direction)
    {
        return $this->query->orderBy('name', $direction);
    }

    public function username($direction)
    {
        return $this->query->orderBy('username', $direction);
    }
}
