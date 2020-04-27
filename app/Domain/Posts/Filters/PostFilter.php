<?php


namespace App\Domain\Posts\Filters;

use App\Domain\Support\Filters\Filter;
use App\Traits\CommonFilter;

class PostFilter extends Filter
{
    use CommonFilter;

    /**
     * Filter post's by post type
     *
     * @param  string  $type
     * @return \App\Builders\Builder
     */
    public function postType(string $type)
    {
        return $this->query->whereEqual('post_type', $type);
    }

    /**
     * Filter post's by title
     *
     * @param  string  $title
     * @return \App\Builders\Builder
     */
    public function title(string $title)
    {
        return $this->query->whereLike('title', $title);
    }

    /**
     * Filter post's by status
     *
     * @param  string  $status
     * @return \App\Builders\Builder
     */
    public function status(string $status)
    {
        return $this->query->whereEqual('status', $status);
    }
}
