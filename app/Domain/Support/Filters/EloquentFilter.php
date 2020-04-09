<?php


namespace App\Domain\Support\Filters;

interface EloquentFilter
{
    public function filter(Filter $filter);
}
