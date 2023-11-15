<?php

namespace Isifnet\PieAdmin\Grid\Actions;

use Isifnet\PieAdmin\Grid\RowAction;

class Edit extends RowAction
{
    /**
     * @return array|null|string
     */
    public function title()
    {
        if ($this->title) {
            return $this->title;
        }

        return '<i class="feather icon-edit-1"></i> '.__('admin.edit').' &nbsp;&nbsp;';
    }

    /**
     * @return string
     */
    public function href()
    {
        return $this->parent->getEditUrl($this->getKey());
    }
}
