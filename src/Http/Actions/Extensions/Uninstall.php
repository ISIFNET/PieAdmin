<?php

namespace Isifnet\PieAdmin\Http\Actions\Extensions;

use Isifnet\PieAdmin\Admin;
use Isifnet\PieAdmin\Grid\RowAction;

class Uninstall extends RowAction
{
    public function title()
    {
        $label = trans('admin.uninstall');

        return "<span class='text-danger'>{$label}</span>";
    }

    public function confirm()
    {
        return [trans('admin.confirm_uninstall'), $this->getKey()];
    }

    public function handle()
    {
        $manager = Admin::extension()
            ->updateManager()
            ->rollback($this->getKey());

        Admin::extension()->get($this->getKey())->uninstall();

        return $this
            ->response()
            ->success(implode('<br>', $manager->notes))
            ->refresh();
    }
}
