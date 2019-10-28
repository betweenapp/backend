<?php


namespace Betweenapp\Backend\src\Services\Auth;


use Betweenapp\Core\Http\Payloads\InvalidCredentials;
use Betweenapp\Core\Http\Payloads\LoginSuccessPayload;
use Betweenapp\Core\Http\Payloads\ValidationPayload;
use Betweenapp\Core\Services\ServiceInterface;

class LoginService implements ServiceInterface
{

	public function handle($data = [])
	{
		if( ($validation = $this->validate($data))->fails() ) {
			return new ValidationPayload($validation->getMessageBag());
		}


		if (auth()->attempt($data) ) {
			return new LoginSuccessPayload([
				'success'
			]);
		} else {
			return new InvalidCredentials([
				'email' => ['Invalid credentials'],
			]);

		}

	}

	public function validate($data)
	{
		return validator($data, [
			'email' => 'required|email',
			'password' => 'required'
		]);

	}

}