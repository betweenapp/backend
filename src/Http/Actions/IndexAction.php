<?php


namespace Betweenapp\Backend\Http\Actions;


use Betweenapp\Backend\Http\Responders\ListResponder;
use Betweenapp\Backend\Services\ListService;
use Betweenapp\Core\Http\Actions\BaseAction;

class IndexAction extends BaseAction
{



    public function handle(array $data = [])
    {
        return $this->responder->withResponse(
            $this->service->entity($this->entity)->handle($data)
        )->respond();
    }

}
