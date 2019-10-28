<?php


namespace Betweenapp\Backend\Http;

use Betweenapp\Core\Database\Model;
use Betweenapp\Core\Http\Controller;
use Illuminate\Support\Facades\Event;
use Betweenapp\Core\Exceptions\NoEntityMethodDefined;
use Jenssegers\Mongodb\Eloquent\Builder;
use Jenssegers\Mongodb\Eloquent\Model as MongoModel;

abstract class BackendController extends Controller
{

	/**
	 * @var mixed MongoModel|Model
	 */
    protected $entity;

	/**
	 * @var Builder
	 */
    protected $builder;

    /**
     * BackendController constructor.
     */
    public function __construct()
    {

        if (! $this->resolveEntity() instanceof MongoModel && ! $this->resolveEntity() instanceof Model) {

        	throw new \Exception('Entity not instance of Betweenapp\Core\Database\Model|Jenssegers\Mongodb\Eloquent\Model');

		}

		$this->entity = $this->resolveEntity();


        if (! $this->builder() instanceof Builder) {

			throw new \Exception('Builder is not instance of Jenssegers\Mongodb\Eloquent\Builder');

		}

        $this->builder = $this->builder();


    }


    abstract function entity();


    protected function builder()
	{
		return $this->entity->query();
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


	public static function extendedListColumn($callback)
	{
		Event::listen('list::extendedChild', function ($type, $column, $model) use ($callback) {
			if ($type === 'columns') {
				call_user_func_array($callback, [$column, $model]);
			}
		});
	}

	public static function extendedListColumns($callback)
	{
		Event::listen('list::extendedChildren', function ($type, $list, $model) use ($callback) {
			if ($type === 'columns') {
				call_user_func_array($callback, [$list, $model]);
			}
		});
	}

}
