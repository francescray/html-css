<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Responses\API;
use App\Lib\Common\Url;
use App\Model\Demand;
use App\Model\User;
use Illuminate\Support\Facades\DB;

class DemandController extends Controller
{
    public function index($id)
    {
        $demand = Demand::get($id);

        // 处理浏览次数
        ++ $demand->demand->view_times;
        $demand->demand->save();

        return view('demand.demand_detail')->withDemand($demand);
    }

    public function s($type)
    {
        $query = request()->except('page');

        $demands = Demand::getPage($type);

        return view('demand/demand_s')
            ->withDemands($demands)
            ->withType($type)
            ->withQuery($query);
    }

    public function getCreate($type)
    {
        return view('demand.demand_edit')->withType($type);
    }

    public function postCreate($type)
    {
        return Demand::createDemand($type);
    }

    public function getEdit($id)
    {
        $demand = Demand::get($id);

        if ($demand->demand->user_id != User::user()->id) {
            return view('errors.common')->withErrors('只能编辑自己发布的信息');
        }

        return view('demand.demand_edit')
            ->withDemand($demand)
            ->withType(strtolower($demand->type->code));
    }

    public function postEdit($id)
    {
        return Demand::editDemand($id);
    }

    public function page($type)
    {
        $query = request()->except('page');

        $demands = Demand::getPage($type);

        return view('demand.demand_page')
            ->withDemands($demands)
            ->withType($type)
            ->withQuery($query);
    }

    public function cooperation($id)
    {
        $demand = Demand::get($id);

        if ($demand == null) {
            return API::success();
        }
        $user = User::user();

    }

    public function cancel()
    {

    }

    public function close()
    {

    }
}