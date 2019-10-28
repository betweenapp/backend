<?php


namespace Betweenapp\Backend\src\Http\Controllers\Users;


use Betweenapp\Backend\Components\Lists\ListColumnComponent;
use Betweenapp\Backend\Components\Lists\ListComponent;

class ListConfig
{

	public static function perspectives()
	{
		return [
			'index' => trans('backend::lists.index')
		];
	}

	public static function perspectivesResourcesClassMap()
	{
		return [
			'index' => UserResource::class
		];
	}

	public static function getEntityResource($perspective)
	{
		$resourcesMap = self::perspectivesResourcesClassMap();
		return $resourcesMap[$perspective];
	}


	public static function create($controller, $model, $perspective)
	{


		return new ListComponent(
			$controller,
			$model,
			$perspective, [
				'title' => trans('backend::users.users'),
				'endpoint' => 'betweenapp/backend/users',
				'permissions' => [],
				'perspectives' => self::perspectives(),
				'sort' => ['key' => 'created_at', 'order' => 'desc'],
				'perPage' => 15,
				'actions' => [],
				'filters' => [],
				'columns' => [
					new ListColumnComponent('id' ,'#', [
						'hidden' => true,
						'permissions' => []
					]),
					new ListColumnComponent('name', trans('backend::users.name'), [
						'sortable' => true,
						'sortKey' => 'first_name',
						'searchable' => true,
					]),
					new ListColumnComponent('email', trans('backend::users.email'), [
						'sortable' => true,
						'searchable' => true
					]),
					new ListColumnComponent('is_admin', trans('backend::users.is_admin'), [
						'sortable' => true,
					])
				]
			]

		);


	}

}