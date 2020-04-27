<?php


namespace App\Domain\Auth\Sorts;


use App\Domain\Support\Sorts\Sort;
use App\Traits\CommonSort;

class RoleSort extends Sort
{
    use CommonSort;

    public function name($direction)
    {
        return $this->query->orderBy('name', $direction);
    }

    public function display_name($direction)
    {
        return $this->query->orderBy('display_name', $direction);
    }
}
