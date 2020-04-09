<?php


namespace App\Domain\Posts\Filters;

use App\Domain\Support\Filters\Filter;

class PostFilter extends Filter
{
    /**
     * Filter post's by post type
     *
     * @param string $type
     * @return \App\Domain\Support\Builder
     */
    public function postType(string $type)
    {
        return $this->query->whereEqual('post_type', $type);
    }

    /**
     * Filter post's by title
     *
     * @param string $title
     * @return \App\Domain\Support\Builder
     */
    public function title(string $title)
    {
        return $this->query->whereLike('title', $title);
    }

    /**
     * Filter post's by status
     *
     * @param string $status
     * @return \App\Domain\Support\Builder
     */
    public function status(string $status)
    {
        return $this->query->whereEqual('status', $status);
    }
}
