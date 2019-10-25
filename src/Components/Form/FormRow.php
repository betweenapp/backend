<?php


namespace Betweenapp\Backend\Components\Form;


use Betweenapp\Backend\Components\ComponentBase;

class FormRow extends ComponentBase
{

    public $alias = 'ba-form-row';

    public function toJson()
    {
        return json_encode([
            'component' => $this->alias
        ]);
    }

}
