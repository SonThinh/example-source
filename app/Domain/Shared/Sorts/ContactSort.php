<?php


namespace App\Domain\Shared\Sorts;


use App\Domain\Support\Sorts\Sort;
use App\Traits\CommonSort;

class ContactSort extends Sort
{
    use CommonSort;

    public function address($direction)
    {
        return $this->query->orderBy('address', $direction);
    }

    public function email($direction)
    {
        return $this->query->orderBy('email', $direction);
    }

    public function city($direction)
    {
        return $this->query->orderBy('city', $direction);
    }

    public function postcode($direction)
    {
        return $this->query->orderBy('postcode', $direction);
    }
}
