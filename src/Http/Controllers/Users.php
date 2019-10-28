<?php


namespace Betweenapp\Backend\Http\Controllers;

use Betweenapp\Backend\Http\BackendApiController;
use Betweenapp\Backend\src\Http\Controllers\Users\ListConfig;
use Betweenapp\Core\Auth\Models\User;

class Users extends BackendApiController
{

	protected $listConfigClass = ListConfig::class;


	public function entity()
	{
		return User::class;
	}


}