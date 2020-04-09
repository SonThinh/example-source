<?php


namespace App\Domain\Support\Filters;


use App\Domain\Support\Builder;
use Illuminate\Http\Request;

abstract class Filter
{
    /**
     * The request instance.
     *
     * @var Request
     */
    private $request;

    /**
     * The builder instance.
     *
     * @var Builder
     */
    protected $query;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Apply the filters to the builder.
     *
     * @param Builder $query
     * @return Builder
     */
    public function apply(Builder $query)
    {
        $this->query = $query;

        foreach ($this->filters() as $method => $value) {
            if (!method_exists($this, $method)) {
                continue;
            }
            if (strlen($value)) {
                $this->{$method}($value);
            }
        }

        return $this->query;
    }

    /**
     * Get request filters data.
     *
     * @return array
     */
    public function filters()
    {
        return $this->request->get('filters', []);
    }
}
