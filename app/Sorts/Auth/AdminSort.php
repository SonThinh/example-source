<?php


namespace App\Sorts\Auth;


use App\Sorts\Sort;
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
