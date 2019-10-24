<?php


namespace Betweenapp\Backend\Http\Controllers\Web;

use Illuminate\Routing\Controller;

class DashboardController extends Controller
{

    public function index()
    {
        return view('backend::layout');
    }

}
