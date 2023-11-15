<?php

namespace Isifnet\PieAdmin\Form\Field;

use Isifnet\PieAdmin\Form\Field;

class Nullable extends Field
{
    public function __construct()
    {
    }

    public function __call($method, $parameters)
    {
        return $this;
    }

    public function render()
    {
    }
}
