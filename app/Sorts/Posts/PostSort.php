<?php


namespace App\Sorts\Posts;

use App\Sorts\Sort;
use App\Domain\Support\Traits\CommonSort;

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
