<?php


namespace Betweenapp\Backend\Components\Forms\Inputs;


use Betweenapp\Backend\Components\ComponentBase;

class TextInputComponent extends ComponentBase
{

    public $field;

    public $label;

    public $disabled;

    public $alias = 'ba-text-input';

    /**
     * @var string The registered type;
     */
    public $type = 'text-input';




}
