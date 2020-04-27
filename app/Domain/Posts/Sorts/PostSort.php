<?php


namespace App\Domain\Posts\Sorts;

use App\Domain\Support\Sorts\Sort;
use App\Traits\CommonSort;

class PostSort extends Sort
{
   use CommonSort;

    public function publish_from($direction)
    {
        return $this->query->orderBy('publish_from',$direction);
    }

    public function publish_to($direction)
    {
        return $this->query->orderBy('publish_to',$direction);
    }
}
