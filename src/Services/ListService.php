<?php


namespace Betweenapp\Backend\Services;


use Betweenapp\Core\Http\Payloads\GenericPayload;
use Betweenapp\Core\Services\BaseService;

class ListService extends BaseService
{

    public function handle($data = [])
    {
        return new GenericPayload($this->entity->get());
    }

}
