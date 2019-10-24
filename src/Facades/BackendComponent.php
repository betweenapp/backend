<?php


namespace Betweenapp\Backend\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * Class BackendComponent
 * @package Betweenapp\Backend\Facades
 *
 * @method static registerFormComponent($alias, $className)
 * @method static registerListComponent($alias, $className)
 * @method static makeFormComponent($alias, $config)
 * @method static makeListComponent($alias, $config)
 * @method static getFormComponents
 * @method static getListComponents
 * @method static flushComponentsRegistration
 */

class BackendComponent extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'backend.component.manager';
    }

}
