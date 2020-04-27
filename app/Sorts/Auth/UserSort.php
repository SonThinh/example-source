<?php


namespace App\Sorts\Auth;


use App\Sorts\Sort;
use App\Traits\CommonSort;

class UserSort extends Sort
{
    use CommonSort;

    public function first_name($direction)
    {
        return $this->query->orderBy('first_name', $direction);
    }

    public function last_name($direction)
    {
        return $this->query->orderBy('last_name', $direction);
    }

    public function gender($direction)
    {
        return $this->query->orderBy('gender', $direction);
    }

    public function birthday($direction)
    {
        return $this->query->orderBy('birthday', $direction);
    }

    public function email($direction)
    {
        return $this->query->orderBy('email', $direction);
    }
}
