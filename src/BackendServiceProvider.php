<?php


namespace Betweenapp\Backend;


use Betweenapp\Backend\Classes\ComponentManager;
use Betweenapp\Backend\Components\Forms\FormComponent;
use Betweenapp\Backend\Components\Lists\ListColumnComponent;
use Betweenapp\Backend\Components\Lists\ListComponent;
use Betweenapp\Backend\Facades\BackendComponent;
use Betweenapp\Backend\Http\Actions\IndexAction;
use Betweenapp\Backend\Http\Controllers\Web\Dashboard;
use Betweenapp\Backend\Http\Responders\ListResponder;
use Betweenapp\Backend\Services\ListService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerRoutes();
        $this->registerPublishing();

        $this->loadViewsFrom(
            __DIR__.'/../resources/views', 'backend'
        );

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerFacades();
        $this->registerBackendComponents();
    }


    private function registerFacades()
    {
        $this->app->bind('backend.component.manager', function () {
            return ComponentManager::instance();
        });
    }


    /**
     * Register the Backend package routes.
     */
    private function registerRoutes()
    {

        Route::group($this->webRouteConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/Http/web.php');
        });


        Route::group($this->apiRouteConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__ . '/Http/api.php');
        });
    }



    /**
     * Get the Backend web routes group configuration array.
     *
     * @return array
     */
    private function webRouteConfiguration()
    {
        return [
            'prefix' => 'backend',
            'namespace' => 'Betweenapp\Backend\Http\Controllers',
        ];
    }

    /**
     * Get the Backend api routes configuration array.
     * @return array
     */
    private function apiRouteConfiguration()
    {

        return [
            'prefix' => 'api/betweenapp/backend',
            'namespace' => 'Betweenapp\Backend\Http\Controllers',
        ];
    }


    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    private function registerPublishing()
    {
		$this->publishes([
			__DIR__.'/../public' => public_path(''),
		], 'betweenapp-backend-assets');
    }


    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerBackendComponents()
    {

        BackendComponent::registerFormComponent('form', FormComponent::class);

        BackendComponent::registerListComponent('list', ListComponent::class);
        BackendComponent::registerListComponent('list-column', ListColumnComponent::class);
    }



}
