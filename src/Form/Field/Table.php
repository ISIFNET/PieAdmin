<?php

namespace Isifnet\PieAdmin\Form\Field;

use Isifnet\PieAdmin\Admin;

class Table extends ArrayField
{
    /**
     * @var string
     */
    protected $viewMode = 'table';

    public function render()
    {
        if (! $this->shouldRender()) {
            return '';
        }

        Admin::style(
            <<<'CSS'
.table-has-many .fields-group .form-group {
    margin-bottom:0;
}
.table-has-many .fields-group .form-group .remove {
    margin-top: 10px;
}
CSS
        );

        return $this->renderTable();
    }
}
