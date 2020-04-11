<?php


namespace App\Domain\Support;

use App\Domain\Support\Filters\EloquentFilter;
use App\Domain\Support\Filters\Filter;
use Closure;
use Illuminate\Database\Eloquent\Builder as BaseBuilder;

class Builder extends BaseBuilder implements EloquentFilter
{
    /**
     * @param  Filter  $filter
     * @return Builder
     */
    public function filter(Filter $filter)
    {
        return $filter->apply($this);
    }

    /**
     * @param  Closure|string|array  $column
     * @param  string|null  $value
     * @return $this
     */
    public function whereStartsWith($column, $value = null)
    {
        $this->where($column, 'like', $value.'%');
        return $this;
    }

    /**
     * @param  Closure|string|array  $column
     * @param  string|null  $value
     * @return $this
     */
    public function whereEndsWith($column, $value = null)
    {
        $this->where($column, 'like', '%'.$value);
        return $this;
    }

    /**
     * @param  Closure|string|array  $column
     * @param  string|null  $value
     * @return $this
     */
    public function whereLike($column, $value = null)
    {
        $this->where($column, 'like', '%'.$value.'%');
        return $this;
    }

    /**
     * @param  Closure|string|array  $column
     * @param  string|null  $value
     * @return $this
     */
    public function whereEqual($column, $value = null)
    {
        $this->where($column, '=', $value);
        return $this;
    }

    /**
     * @param  Closure|string|array  $column
     * @param  string|null  $value
     * @return $this
     */
    public function whereNotEqual($column, $value = null)
    {
        $this->where($column, '<>', $value);
        return $this;
    }

    /**
     * @param  string  $column
     * @param  array  $value
     * @return Builder|\Illuminate\Database\Query\Builder
     */
    public function whereDateRange($column, array $value = [])
    {
        $from = Arr::get($value, 'from', '');
        $to = Arr::get($value, 'to', '');
        $this->query->where(function (Builder $query) use ($column, $from, $to) {
            return $query
                ->when($from, function (Builder $query) use ($column, $from) {
                    return $query->where($column, '>=', $from);
                })
                ->when($to, function (Builder $query) use ($column, $to) {
                    return $query->where($column, '<=', $to);
                });
        });
        return $this;
    }
}
