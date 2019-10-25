<?php


namespace Betweenapp\Backend\Http\Controllers\Web;

use Betweenapp\Backend\Components\Lists\ListColumnComponent;
use Betweenapp\Backend\Components\Lists\ListComponent;
use Betweenapp\Backend\Models\User;
use Illuminate\Routing\Controller;

class Dashboard extends Controller
{

    protected $listComponent;

    public function __construct()
    {
        $this->listComponent = new ListComponent(
            'azeoni//insurance//insurances',
            __('insurances.insurances'),
            [
                new ListColumnComponent('name', __('insurances.name'), null, [
                    'sortable' => true,
                    'width' => '200px'
                ])
            ]);

        \Event::listen('backend.list.extendedColumns', function ($list) {
           return $this->listExtendedColumns($this->listComponent, $list);
        });

    }

    public function index()
    {
        return view('backend::layout', ['listDefinition' => $this->listComponent->toJson()]);
    }


    public static function extendedListColumns($callback)
    {
        \Event::listen('backend.list.extendedColumns', function ($list) use ($callback) {
            call_user_func_array($callback, [$list, new User()]);
        });
    }

}
