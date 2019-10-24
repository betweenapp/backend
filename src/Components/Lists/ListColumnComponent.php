<?php


namespace Betweenapp\Backend\Components\Lists;


use Betweenapp\Backend\Components\ComponentBase;

class ListColumnComponent extends ComponentBase
{

    public $alias = 'ba-list-column';

    public $field;

    public $label;

    public $component;

    protected $defaultConfig = [
        'sortable' => false,
        'width' => '',
    ];


    /**
     * ColumnComponent constructor.
     * @param $field
     * @param $label
     * @param $component
     * @param array $configuration
     */
    public function __construct($field, $label, $component, $configuration = [])
    {
        $this->field = $field;
        $this->label = $label;
        $this->component = $component;
        $this->makeComponentDefinition();
        parent::__construct($configuration);
    }

    protected function makeComponentDefinition()
    {
        $this->componentDefinition =  [
            'field' => $this->field,
            'label' => $this->label,
            'component' => $this->component
        ];
    }


}
