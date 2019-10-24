<?php


namespace Betweenapp\Backend\Components;


use Betweenapp\Backend\Exceptions\DuplicatedFormAliasRegistrationException;
use Betweenapp\Backend\Exceptions\DuplicatedListAliasRegistrationException;
use Betweenapp\Backend\Exceptions\FormComponentNotFoundException;
use Betweenapp\Backend\Exceptions\ListComponentNotFoundException;
use Betweenapp\Backend\Traits\SingletonTrait;

class ComponentManager
{
    use SingletonTrait;

    protected $formComponents = [];

    protected $listComponents = [];


    /**
     * Registers a form component
     *
     * @param $alias
     * @param $className
     * @throws DuplicatedFormAliasRegistrationException
     */
    public function registerFormComponent($alias, $className)
    {

        if(! array_key_exists($alias, $this->formComponents)) {
            $this->formComponents = array_merge($this->formComponents, [ $alias => $className ]);
        } else {
            throw new DuplicatedFormAliasRegistrationException('Duplicated Form component alias are not allowed');
        }


    }

    /**
     * @param $alias
     * @param $className
     * @throws DuplicatedListAliasRegistrationException
     */
    public function registerListComponent($alias, $className)
    {
        if (! array_key_exists($alias, $this->listComponents)) {
            $this->listComponents = array_merge($this->listComponents, [ $alias => $className ]);
        } else {
            throw new DuplicatedListAliasRegistrationException('Duplicated List component alias are not allowed');
        }

    }


    /**
     * @param $alias
     * @param $config
     * @return mixed
     * @throws FormComponentNotFoundException
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function makeFormComponent($alias, $config = [])
    {
        if (array_key_exists($alias, $this->formComponents)) {
            return new $this->formComponents[$alias]($config);
        } else {
            throw new FormComponentNotFoundException('Form Component not found');
        }
    }

    /**
     * @param $alias
     * @param $config
     * @return mixed
     * @throws ListComponentNotFoundException
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function makeListComponent($alias, $config = [])
    {
        if (array_key_exists($alias, $this->listComponents)) {
            return new $this->listComponents[$alias]($config);
        } else {
            throw new ListComponentNotFoundException('List Component not found');
        }
    }

    /**
     * @return array
     */
    public function getFormComponents()
    {
        return $this->formComponents;
    }

    /**
     * @return array
     */
    public function getListComponents()
    {
        return $this->listComponents;
    }

    /**
     *
     */
    public function flushComponentsRegistration()
    {
        $this->listComponents = [];
        $this->formComponents = [];
    }

}
