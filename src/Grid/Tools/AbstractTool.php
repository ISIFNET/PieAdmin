<?php

namespace Isifnet\PieAdmin\Grid\Tools;

use Isifnet\PieAdmin\Grid;

abstract class AbstractTool extends Grid\GridAction
{
    /**
     * @var string
     */
    protected $style = 'btn btn-white waves-effect';

    /**
     * @return string
     */
    protected function html()
    {
        $this->appendHtmlAttribute('class', $this->style);

        return <<<HTML
<button {$this->formatHtmlAttributes()}>{$this->title()}</button>
HTML;
    }
}
