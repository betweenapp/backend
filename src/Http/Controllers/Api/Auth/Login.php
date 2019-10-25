<?php


namespace Betweenapp\Backend\Http\Controllers\Api\Auth;


use Betweenapp\Backend\Http\BackendApiController;
use Betweenapp\Backend\Http\Controllers\Api\Auth\login\FormConfig;

class Login extends BackendApiController
{


    protected $formConfigClass = FormConfig::class;

    protected $formConfig;

    public function __construct()
    {
        parent::__construct();

        $this->formConfig = (new $this->formConfigClass($this))->get();

    }

    public function init()
    {

    }

    public function formConfig()
    {
        return $this->formConfig();
    }

    public function entity()
    {
        return null;
    }

}
