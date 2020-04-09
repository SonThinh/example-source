<?php


namespace App\Domain\Support;

use App\Domain\Support\Filters\EloquentFilter;
use App\Domain\Support\Filters\Filter;
use Closure;
use Illuminate\Database\Eloquent\Builder as BaseBuilder;

class Builder extends BaseBuilder implements EloquentFilter
{
    /**
     * @param Filter $filter
     * @return Builder
     */
    public function filter(Filter $filter)
    {
        return $filter->apply($this);
    }

    /**
     * @param Closure|string|array $column
     * @param string|null $value
     * @return $this
     */
    public function whereStartsWith($column, $value = null)
    {
        $this->where($column, 'like', $value . '%');
        return $this;
    }

    /**
     * @param Closure|string|array $column
     * @param string|null $value
     * @return $this
     */
    public function whereEndsWith($column, $value = null)
    {
        $this->where($column, 'like', '%' . $value);
        return $this;
    }

    /**
     * @param Closure|string|array $column
     * @param string|null $value
     * @return $this
     */
    public function whereLike($column, $value = null)
    {
        $this->where($column, 'like', '%' . $value . '%');
        return $this;
    }

    /**
     * @param Closure|string|array $column
     * @param string|null $value
     * @return $this
     */
    public function whereEqual($column, $value = null)
    {
        $this->where($column, '=', $value);
        return $this;
    }

    /**
     * @param Closure|string|array $column
     * @param string|null $value
     * @return $this
     */
    public function whereNotEqual($column, $value = null)
    {
        $this->where($column, '<>', $value);
        return $this;
    }
}
