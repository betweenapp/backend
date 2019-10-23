<?php


namespace Betweenapp\Backend\Http\Contracts;


use Betweenapp\Backend\Services\ListService;

interface BackendApiControllerInterface
{

    public function index();

    public function store();

    public function show();

    public function update();

    public function destroy();

    public function listDefinitions();

    public function createDefinitions();

    public function entity();

}
