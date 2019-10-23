<?php


namespace Betweenapp\Backend;


use Betweenapp\Backend\Http\Actions\IndexAction;
use Betweenapp\Backend\Http\Responders\ListResponder;
use Betweenapp\Backend\Services\ListService;
use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
    }

}
