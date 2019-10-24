<?php


namespace Betweenapp\Backend\Components\Lists;

use Betweenapp\Backend\Components\ComponentBase;

class ListComponent extends ComponentBase
{

    /**
     * @var string The component name
     */
    public $alias = 'ba-list';

    /**
     * @var string The Resource namespace;
     */
    public $namespace;

    /**
     * @var string The list title;
     */
    protected $title;

    /**
     * @var bool If the list is Searchable;
     */
    protected $searchable = true;

    /**
     * @var bool Records to display per page, use 0 for no pages. Default: 0;
     */
    protected $recordsPerPage = 20;

    /**
     * @var string
     */
    protected $sortColumn = 'created_at';

    /**
     * @var string
     */
    protected $sortDirection = 'desc';

    /**
     * @var array
     */
    public $columns = [];

    public function __construct($namespace, $title, $columns, $configuration = [])
    {
        $this->namespace = $namespace;
        $this->title = $title;
        $this->makeColumns($columns);
        $this->makeComponentDefinition();
        parent::__construct($configuration);
    }

    protected function makeComponentDefinition()
    {
        $this->componentDefinition =  [
            'title' => $this->title,
            'namespace' => $this->namespace,
            'searchable' => $this->searchable,
            'recordsPerPage' => $this->recordsPerPage,
            'sortColumn' => $this->sortColumn,
            'sortDirection' => $this->sortDirection,
            'columns' => $this->columns
        ];
    }

    protected function makeColumns($columns)
    {
        $this->makeChildren('columns', $columns);
    }

}
