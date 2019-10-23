<?php


namespace Betweenapp\Backend\Http\Responders;


use Betweenapp\Core\Http\Responders\BaseResponder;

class ListResponder extends BaseResponder
{

    public function respond()
    {
        return response()->json($this->response->getData(), $this->response->getStatus());
    }


}
