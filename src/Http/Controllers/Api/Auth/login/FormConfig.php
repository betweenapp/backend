<?php


namespace Betweenapp\Backend\Http\Controllers\Api\Auth\login;


use Betweenapp\Backend\Components\Form\Form;

class FormConfig
{

    protected $controller;

    /**
     * FormConfig constructor.
     * @param $controller
     */
    public function __construct($controller)
    {
        $this->controller = $controller;
    }

    public function get()
    {

        return (new Form($this->controller))->toJson();

    }

}
