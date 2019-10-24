<?php


namespace Betweenapp\Backend\Components;

use Betweenapp\Backend\Facades\BackendComponent;
use Betweenapp\Backend\Http\BackendApiController;

abstract class ComponentBase
{

    /**
     * @var object Supplied configuration.
     */
    public $config;

    /**
     * @var
     */
    public $alias;

    /**
     * @var array of child components
     */
    public $components;

    /**
     * @var array
     */
    protected $defaultConfig = [];

    protected $componentDefinition = [];


    public function __construct($configuration = [])
    {

        if (array_key_exists('components', $configuration)) {
            $this->makeComponents($configuration['components']);
            unset($configuration['components']);
        }

        $this->makeConfiguration($configuration);

    }

    /**
     * Initialize the widget, called by the constructor and free from its parameters.
     * @return void
     */
    public function init()
    {
    }

    public function toJson()
    {
        $definition = array_merge([
            'alias' => $this->alias,
        ], $this->componentDefinition, ['props' => $this->config]);

        if ($this->components && is_array($this->components)) {
            $definition = array_merge($definition, ['components' => $this->components]);
        }
        return json_encode($definition);
    }

    public function makeConfiguration($configuration = [])
    {

        foreach ($configuration as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
                unset($configuration[$key]);
            }
        }

        $this->config = array_merge($this->defaultConfig, $configuration);
    }

    public function makeComponents($components) {
        $this->makeChildren('components', $components);
    }

    public function makeChildren($childrenType, $children) {
        foreach ($children as $child) {
            if (is_array($child)) {
                $this->{$childrenType}[] = BackendComponent::makeListComponent($child['alias'], $child)->toJson();
            } elseif ($child instanceof ComponentBase) {
                $this->{$childrenType}[] = $child->toJson();
            }
        }
    }

}
