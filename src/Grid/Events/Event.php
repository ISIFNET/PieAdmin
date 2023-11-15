<?php

namespace Isifnet\PieAdmin\Grid\Events;

use Isifnet\PieAdmin\Grid;

abstract class Event
{
    /**
     * @var Grid
     */
    public $grid;

    public $payload = [];

    public function __construct(array $payload = [])
    {
        $this->payload = $payload;
    }

    public function setGrid(Grid $grid)
    {
        $this->grid = $grid;
    }
}
