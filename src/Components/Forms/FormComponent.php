<?php


namespace Betweenapp\Backend\Components\Forms;


use Betweenapp\Backend\Components\ComponentBase;
use Betweenapp\Core\src\Auth\Models\User;
use Illuminate\Support\Facades\Event;

class FormComponent extends ComponentBase
{

	public $alias = 'ba-form';

	/**
	 * @var string The registered type;
	 */
	protected $type = 'form';

	public $namespace;

	public $title;

	public $action;

	public $method;

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
	public $context;

	/**
	 * @var
	 */
	public $rows;

	/**
	 * @var
	 */
	public $actions;

	/**
	 * @var array
	 */
	public $data = [];

	public function __construct($controller, $model, $context, $configuration = [])
	{

		$this->controller = $controller;
		$this->model = $model;
		$this->context = $context;
		parent::__construct($configuration);


	}

	public function init()
	{

		$this->registerEvents();

		$this->makeChildren('rows');

		return parent::init();



	}

	protected function registerEvents()
	{

		Event::listen('form::extendedChild', function ($type, $child) {

			if (array_key_exists('children', $child)) {

				foreach ($child['children'] as $input) {

					if (array_key_exists('field', $input)) {

						$this->data[$input['field']] =  $this->model->{$input['field']};

					}
				}
			}
		});

	}



}
