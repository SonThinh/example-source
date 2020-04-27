<?php


namespace App\Sorts\Shared;


use App\Sorts\Sort;
use App\Domain\Support\Traits\CommonSort;

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
