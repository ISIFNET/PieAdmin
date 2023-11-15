<?php

namespace Isifnet\PieAdmin\Form\Events;

use Isifnet\PieAdmin\Form;

abstract class Event
{
    /**
     * @var Form
     */
    public $form;

    public $payload = [];

    public function __construct(Form $form, array $payload = [])
    {
        $this->form = $form;
        $this->payload = $payload;
    }
}
