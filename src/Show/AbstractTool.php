<?php

namespace Isifnet\PieAdmin\Show;

use Isifnet\PieAdmin\Actions\Action;
use Isifnet\PieAdmin\Show;

abstract class AbstractTool extends Action
{
    /**
     * @var Show
     */
    protected $parent;

    /**
     * @var string
     */
    protected $style = 'btn btn-sm btn-primary';

    /**
     * @param  Show  $show
     * @return void
     */
    public function setParent(Show $show)
    {
        $this->parent = $show;
    }

    /**
     * @return array|mixed|string|null
     */
    public function getKey()
    {
        if ($this->primaryKey) {
            return $this->primaryKey;
        }

        return $this->parent ? $this->parent->getKey() : null;
    }

    /**
     * @return void
     */
    public function setupHtmlAttributes()
    {
        $this->addHtmlClass($this->style);

        parent::setupHtmlAttributes();
    }
}
