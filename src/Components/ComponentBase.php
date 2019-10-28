<?php


namespace Betweenapp\Backend\Components;

use Betweenapp\Backend\Components\Forms\FormRowComponent;
use Betweenapp\Backend\Facades\BackendComponent;
use Betweenapp\Backend\Http\BackendApiController;
use Illuminate\Support\Facades\Event;

abstract class ComponentBase
{

	/**
	 * @var object Supplied configuration.
	 */
	protected $config = [];

	/**
	 * @var
	 */
	public $alias;

	public $children;


	/**
	 * @var
	 */
	protected $type;


	/**
	 * @var array
	 */
	protected $configuration = [];


	public function __construct($configuration = [])
	{

		$this->configuration = $configuration;



	}

	/**
	 * Initialize the widget, called by the constructor and free from its parameters.
	 *
	 * @param BackendApiController $controller
	 * @param null $model
	 * @param strin|null $context
	 * @return object
	 */
	public function init()
	{

		$this->makeChildren('children');
		$this->makeConfiguration();

		return $this->config;

	}



	protected function makeConfiguration()
	{

		$this->config = array_merge($this->getPublicProperties(), $this->configuration);


	}


	public function makeChildren($childrenType)
	{

		if (array_key_exists($childrenType, $this->configuration)) {

			foreach ($this->configuration[$childrenType] as $key => $child) {

				if (is_array($child)) {

					$this->$childrenType[] = $child =
						BackendComponent::makeListComponent(
							$child['type'],
							$child
						)->init();

				} elseif ($child instanceof ComponentBase) {

					$this->$childrenType[] = $child =
						$child->init();

				}
				//We want to emit a event that returns the child configuration and the child type

				Event::dispatch($this->type . '::extendedChild', [
                    $childrenType,
                    $child,
                    $this->getModel()]);
			}

            unset($this->configuration[$childrenType]);

            Event::dispatch($this->type . '::extendedChildren', [
                $childrenType,
                $this,
                $this->getModel()
            ]);
		}


    }

    private function getModel()
    {

        return property_exists($this,  'model') ? $this->model : null;

    }


	public function getConfiguration()
	{
		return $this->config;
	}

	private function getPublicProperties()
	{
		$properties = [];
		$publicProperties = (new \ReflectionObject($this))->getProperties(\ReflectionProperty::IS_PUBLIC);
		foreach ($publicProperties as $property) {
			$properties[$property->name] = $this->{$property->name};
		}

		return $properties;
	}

}
