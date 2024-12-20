<?php

namespace Isifnet\PieAdmin\Grid;

use Isifnet\PieAdmin\Actions\Action;
use Isifnet\PieAdmin\Grid;

/**
 * Class GridAction.
 */
abstract class GridAction extends Action
{
    /**
     * @var Grid
     */
    protected $parent;

    /**
     * @param  Grid  $grid
     * @return $this
     */
    public function setGrid(Grid $grid)
    {
        $this->parent = $grid;

        return $this;
    }

    /**
     * Get url path of current resource.
     *
     * @return string
     */
    public function resource()
    {
        return $this->parent->resource();
    }
}
