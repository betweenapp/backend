<?php


namespace Betweenapp\Backend\Components\Lists;

use Betweenapp\Backend\Components\ComponentBase;
use Illuminate\Support\Facades\Event;

class ListComponent extends ComponentBase
{

	/**
	 * @var string The component name
	 */
	public $alias = 'ba-list';

	/**
	 * @var string The registered type;
	 */
	public $type = 'list';

	/**
	 * @var string The Resource namespace;
	 */
	public $namespace;

	/**
	 * @var string The list title;
	 */
	public $title;

	/**
	 * @var
	 */
	protected $controller;

	/**
	 * @var
	 */
	protected $model;

	/**
	 * @var
	 */
	public $perspective;

	/**
	 * @var bool If the list is Searchable;
	 */
	public $searchable = true;

	/**
	 * @var bool Records to display per page, use 0 for no pages. Default: 0;
	 */
	public $perPage = 10;

	/**
	 * @var string
	 */
	public $sort = [ 'key' => 'created_at', 'order' => 'desc' ];


	/**
	 * @var array
	 */
	public $columns = [];




	public function __construct($controller, $model, $perspective, $configuration = [])
	{
		$this->controller = $controller;
		$this->model = $model;
		$this->perspective = $perspective;
		parent::__construct($configuration);
	}


	public function init()
	{
		$this->registerEvents();
		$this->makeChildren('columns');
		return parent::init();
	}


	protected function registerEvents()
	{

		Event::listen('list::extendedChild', function ($type, $child, $model) {

		});


	}


}
