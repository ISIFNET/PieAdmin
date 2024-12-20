<?php

namespace Isifnet\PieAdmin\Grid\Filter;

use Illuminate\Support\Arr;

class Like extends AbstractFilter
{
    /**
     * Get condition of this filter.
     *
     * @param  array  $inputs
     * @return array|mixed|void
     */
    public function condition($inputs)
    {
        $value = Arr::get($inputs, $this->column);

        if ($value === null) {
            return;
        }

        $this->value = $value;

        return $this->buildCondition($this->column, 'like', "%{$this->value}%");
    }
}
