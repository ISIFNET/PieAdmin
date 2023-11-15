<?php

namespace Isifnet\PieAdmin\Grid\Displayers;

use Isifnet\PieAdmin\Admin;

class Input extends Editable
{
    protected $type = 'input';

    protected $view = 'admin::grid.displayer.editinline.input';

    public function display($options = [])
    {
        if (! empty($options['mask'])) {
            Admin::requireAssets('@jquery.inputmask');
        }

        return parent::display($options);
    }
}
