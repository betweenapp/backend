<?php


namespace Betweenapp\Backend\Components\Form;


use Betweenapp\Backend\Components\ComponentBase;

class Form extends ComponentBase
{

    public $alias = 'ba-form';

    public $namespace;

    public $action;

    public $method;

    public function __construct($controller, $configuration = [])
    {
        parent::__construct($configuration);
    }

}
