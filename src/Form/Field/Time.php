<?php

namespace Isifnet\PieAdmin\Form\Field;

class Time extends Date
{
    protected $format = 'HH:mm:ss';

    public function render()
    {
        $this->prepend('<i class="fa fa-clock-o fa-fw"></i>')
            ->defaultAttribute('style', 'width: 200px;flex:none');

        return parent::render();
    }
}
