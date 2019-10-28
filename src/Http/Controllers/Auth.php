<?php


namespace Betweenapp\Backend\Http\Controllers;


use Betweenapp\Backend\Http\BackendApiController;
use Betweenapp\Backend\Http\Controllers\Auth\FormConfig;
use Betweenapp\Backend\Http\Responders\GenericResponder;
use Betweenapp\Core\Auth\Models\User;
use Betweenapp\Backend\src\Services\Auth\LoginService;
use Illuminate\Http\Request;

class Auth extends BackendApiController
{

    protected $formConfigClass = FormConfig::class;

    protected $formConfig;


    public function entity()
    {
        return User::class;
    }

    public function login(Request $request, GenericResponder $responder, LoginService $service)
	{

		return $responder->withResponse(
			$service->handle($request->only('email', 'password'))
		)->respond();

	}

}
