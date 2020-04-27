<?php


namespace App\Filters;

use App\Filters\Filter;

interface EloquentFilter
{
    public function filter(Filter $filter);
}
