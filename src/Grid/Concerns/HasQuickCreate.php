<?php

namespace Isifnet\PieAdmin\Grid\Concerns;

use Closure;
use Isifnet\PieAdmin\Grid\Tools\QuickCreate;

trait HasQuickCreate
{
    /**
     * @var QuickCreate
     */
    protected $quickCreate;

    /**
     * @param  Closure  $callback
     * @return $this
     */
    public function quickCreate(\Closure $callback)
    {
        $this->quickCreate = new QuickCreate($this);

        call_user_func($callback, $this->quickCreate);

        return $this;
    }

    /**
     * Indicates grid has quick-create.
     *
     * @return bool
     */
    public function hasQuickCreate()
    {
        return ! is_null($this->quickCreate);
    }

    /**
     * Render quick-create form.
     *
     * @return array|string
     */
    public function renderQuickCreate()
    {
        $columnCount = $this->columns->count();

        return $this->quickCreate->render($columnCount);
    }
}
