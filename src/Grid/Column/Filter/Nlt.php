<?php

namespace Isifnet\PieAdmin\Grid\Column\Filter;

use Isifnet\PieAdmin\Grid\Model;

class Nlt extends Equal
{
    /**
     * Add a binding to the query.
     *
     * @param  string  $value
     * @param  Model|null  $model
     */
    public function addBinding($value, Model $model)
    {
        $value = trim($value);
        if ($value === '') {
            return;
        }

        $this->withQuery($model, 'where', ['>=', $value]);
    }
}
