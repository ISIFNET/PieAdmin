<?php

namespace Isifnet\PieAdmin\Grid\Filter;

use Illuminate\Support\Arr;

class WhereBetween extends Between
{
    /**
     * {@inheritdoc}
     */
    protected $view = 'admin::filter.between';

    /**
     * Query closure.
     *
     * @var \Closure
     */
    protected $where;

    /**
     * Input value from presenter.
     *
     * @var mixed
     */
    public $input;

    /**
     * Where constructor.
     *
     * @param  string  $column
     * @param  \Closure  $query
     * @param  string  $label
     */
    public function __construct($column, \Closure $query, $label = '')
    {
        $this->where = $query;
        $this->column = $column;
        $this->label = $this->formatLabel($label);
    }

    /**
     * Get condition of this filter.
     *
     * @param  array  $inputs
     * @return array|mixed|void
     */
    public function condition($inputs)
    {
        $value = Arr::get($inputs, $this->column) ?: [];

        if (
            ! $value
            || (! isset($value['start']) && ! isset($value['end']))
        ) {
            return;
        }

        $this->input = $this->value = $value;

        return $this->buildCondition($this->where->bindTo($this));
    }
}
