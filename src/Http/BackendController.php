<?php


namespace Betweenapp\Backend\Http;

use Betweenapp\Core\Exceptions\NoEntityMethodDefined;
use Betweenapp\Core\Http\Controller;

class BackendController extends Controller
{

    protected $entity;

    /**
     * BackendController constructor.
     */
    public function __construct()
    {
        $this->entity = $this->resolveEntity();
    }


    /**
     * @return mixed
     * @throws \Exception
     */
    protected function resolveEntity()
    {
        if (!method_exists($this, 'entity')) {
            throw new NoEntityMethodDefined('No entity method defined');
        }
        return app()->make($this->entity());
    }

}
