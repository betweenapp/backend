<?php


namespace Betweenapp\Backend\Http\Controllers\Auth;


use Betweenapp\Backend\Components\Forms\FormComponent;
use Betweenapp\Backend\Components\Forms\FormRowComponent;
use Betweenapp\Backend\Components\Forms\Inputs\TextInputComponent;

class FormConfig
{


	public static function create($controller, $model, $context)
	{

		return (new FormComponent(
				$controller,
				$model,
				$context,
				[
				'title' => __('backend.login'),
				'namespace' => 'betweenapp/backend/login',
				'action' => 'this.login(this, this.form)',
				'rows' => [
					new FormRowComponent([
						'children' => [
							new TextInputComponent([
								'field' => 'email',
								'label' => 'Email',
								'description' => 'Please enter your email.',
								'placeholder' => 'Email'
							])
						]
					]),
					new FormRowComponent([
						'children' => [
							new TextInputComponent([
								'field' => 'password',
								'label' => 'Password'
							])
						]
					]),
				],
			]
		));

	}

}
