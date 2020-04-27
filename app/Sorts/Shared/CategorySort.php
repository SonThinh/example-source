<?php

namespace App\Sorts\Shared;

use App\Sorts\Sort;
use App\Traits\CommonSort;

class CategorySort extends Sort
{
    use CommonSort;

    public function display_name($direction)
    {
        return $this->query->orderBy('display_name', $direction);
    }

    public function display_order($direction)
    {
        return $this->query->orderBy('display_order', $direction);
    }

    public function category_type($direction)
    {
        return $this->query->orderBy('category_type', $direction);
    }
}
