<?php


namespace Betweenapp\Backend\Http;


use Betweenapp\Backend\Http\Actions\IndexAction;
use Betweenapp\Backend\Http\Contracts\BackendApiControllerInterface;
use Betweenapp\Backend\Http\Responders\ListResponder;
use Betweenapp\Backend\Services\ListService;

abstract class BackendApiController extends BackendController
{

    protected $listService = ListService::class;
    protected $listResponder = ListResponder::class;

    protected $listRelations = [];
    protected $showRelations = [];


    public function index() {
        $service = app()->make($this->listService);
        $responder = app()->make($this->listResponder);
        return (new IndexAction($service, $responder))
            ->entity($this->entity->with($this->listRelations))
            ->handle();
    }

    public function store() {}

    public function show() {}

    public function update() {}

    public function destroy() {}

    public function listDefinitions() {}

    public function createDefinitions() {}


}
