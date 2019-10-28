<?php


namespace Betweenapp\Backend\src\Http\Responders\Auth;


use Illuminate\Http\Resources\Json\JsonResource;

class PrivateUserResource extends JsonResource
{

	public function toArray($request)
	{
		return [
			'id' => $this->id,
			'name' => $this->name,
			'email' => $this->email
		];
	}

}