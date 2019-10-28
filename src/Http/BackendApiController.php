<?php


namespace Betweenapp\Backend\Http;


use Betweenapp\Backend\Http\Actions\IndexAction;
use Betweenapp\Backend\Http\Contracts\BackendApiControllerInterface;
use Betweenapp\Backend\Http\Responders\ListResponder;
use Betweenapp\Backend\Resources\ResourceCollection;
use Betweenapp\Backend\Services\ListService;
use Betweenapp\Backend\src\Http\Controllers\Users\ListConfig;
use Betweenapp\Backend\src\Http\Controllers\Users\UserResource;
use Betweenapp\Backend\src\Http\Controllers\Users\UserResourceCollection;
use Betweenapp\Core\src\Auth\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

abstract class BackendApiController extends BackendController
{

    protected $listService = ListService::class;
    protected $listResponder = ListResponder::class;

    protected $listConfigClass;

    protected $listRelations = [];
    protected $showRelations = [];



    public function index(Request $request)
	{

		$perspective = $request->get('perspective') ? $request->get('perspective') : 'index';
		$definition = $this->getListDefinition($perspective);


		if ($withDefinition = json_decode($request->get('definition'))) {
			$request->request->add([
				'sort' => [
					'key' => $definition['sort']['key'],
					'order' => $definition['sort']['order'],
				],
				'perPage' => $definition['perPage']
			]);
		}


		return new ResourceCollection(
			$this->getRecords($request),
			$this->getEntityResource($perspective),
			$withDefinition ? $definition : null
		);


    }

	protected function getRecords(Request $request)
	{

		$sort = $request->get('sort');

		//dd($sort);


		return $this->builder->orderBy($sort['key'], $sort['order'])
			->paginate($request->get('perPage'));

	}

    protected function getEntityResource($perspective)
	{
		return $this->listConfigClass::getEntityResource($perspective);
	}

    protected function getListDefinition($perspective)
	{
		return $this->listConfigClass::create($this, $this->entity, $perspective)->init();
	}



    public function create()
		{

			$formConfiguration = $this->formConfigClass::create($this, $this->entity, 'login')->init();
			return response()->json($formConfiguration, 200);

		}

    public function store() {}

    public function show() {}

    public function update() {}

    public function destroy() {}

    public function listDefinitions() {}

    public function createDefinitions() {}


}
