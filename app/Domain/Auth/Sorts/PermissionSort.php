<?php


namespace App\Domain\Auth\Sorts;


use App\Domain\Support\Sorts\Sort;
use App\Domain\Support\Traits\CommonSort;

class PermissionSort extends Sort
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
