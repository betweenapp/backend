<?php


namespace Betweenapp\Backend\src\Components\Buttons;

use Betweenapp\Backend\Components\ComponentBase;
use Betweenapp\Backend\Components\Forms\FormComponent;
use Illuminate\Support\Facades\File;

abstract class ButtonBase extends ComponentBase
{


	/**
	 * @var bool Either is a block button or not
	 */
	public $block = false;

	/**
	 * @var bool Prefer buttons with a more rounded-pill style? Just set the prop pill to true.
	 */
	public $pill = false;

	/**
	 * @var bool Prefer buttons with a more square corner style? Just set the prop squared to true.
	 */
	public $squared = false;

	/**
	 * @var bool Set the disabled prop to disable button default functionality.
	 */
	public $disabled = false;

	/**
	 * Buttons will appear pressed (with a darker background, darker border,
	 * and inset shadow) when the prop pressed is set to true.
	 *
	 * Options are:
	 *
	 * true
	 * false
	 * null
	 *
	 * @var null|bool
	 */
	public $pressed = null;





}
