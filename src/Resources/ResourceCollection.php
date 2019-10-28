<?php


namespace Betweenapp\Backend\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection as JsonResourceCollection;

class ResourceCollection extends JsonResourceCollection
{

	protected $list;

	protected $resourceClass;

	public function __construct($collection, $resourceClass, $list = null)
	{
		$this->list = $list;
		$this->resourceClass = $resourceClass;
		parent::__construct($collection);
	}

	public function toArray($request)
	{
		$data =  [
			'records' => $this->resourceClass::collection($this->resource),
		];



		if ( $this->list ) {
			$this->additional(['list' => $this->list]);
		}

		return $data;

	}


}