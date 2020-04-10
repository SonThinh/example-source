<?php


namespace App\Domain\Posts\Builders;


use App\Domain\Support\Builder;

class PostBuilder extends Builder
{
    public function whereType(string $type)
    {
        return $this->where('post_type', $type);
    }
}
