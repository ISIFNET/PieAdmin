<?php

namespace Isifnet\PieAdmin\Form\Concerns;

use Closure;
use Isifnet\PieAdmin\Form\Row;

trait HasRows
{
    /**
     * Field rows in form.
     *
     * @var Row[]
     */
    protected $rows = [];

    /**
     * Add a row in form.
     *
     * @param  Closure  $callback
     * @return $this
     */
    public function row(Closure $callback)
    {
        $this->rows[] = new Row($callback, $this);

        return $this;
    }

    /**
     * @return Row[]
     */
    public function rows()
    {
        return $this->rows;
    }
}
