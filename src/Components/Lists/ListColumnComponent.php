<?php


namespace Betweenapp\Backend\Components\Lists;


use Betweenapp\Backend\Components\ComponentBase;

class ListColumnComponent extends ComponentBase
{

    public $alias = 'ba-list-column';

    public $type = 'list-column';

    public $field;

    public $label;

    public $value;




    /**
     * ColumnComponent constructor.
     * @param $field
     * @param $label
     * @param array $configuration
     */
    public function __construct($field, $label, $configuration = [])
    {
        $this->field = $field;
        $this->label = $label;
        parent::__construct($configuration);
    }



}
