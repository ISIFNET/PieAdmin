<?php

namespace Isifnet\PieAdmin\Http\Actions\Extensions;

use Isifnet\PieAdmin\Grid\Tools\AbstractTool;
use Isifnet\PieAdmin\Http\Forms\InstallFromLocal as InstallFromLocalForm;
use Isifnet\PieAdmin\Widgets\Modal;

class InstallFromLocal extends AbstractTool
{
    protected $style = 'btn btn-primary';

    public function html()
    {
        return Modal::make()
            ->lg()
            ->title($title = trans('admin.install_from_local'))
            ->body(InstallFromLocalForm::make())
            ->button("<button class='btn btn-primary'><i class=\"feather icon-folder\"></i> &nbsp;{$title}</button> &nbsp;");
    }
}
