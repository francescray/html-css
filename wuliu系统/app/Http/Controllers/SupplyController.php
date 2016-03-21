<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Responses\API;
use App\Lib\Common\Url;
use App\Model\Supply;
use App\Model\User;
use Illuminate\Support\Facades\DB;

class SupplyController extends Controller
{
    public function index($id)
    {
        $supply = Supply::get($id);

        // 处理浏览次数
        ++ $supply->supply->view_times;
        $supply->supply->save();

        return view('supply.supply_detail')->withSupply($supply);
    }

    public function s($type)
    {
        $query = request()->except('page');

        $supplies = Supply::getPage($type);

        return view('supply/supply_s')
            ->withSupplies($supplies)
            ->withType($type)
            ->withQuery($query);
    }

    public function getCreate($type)
    {
        return view('supply.supply_edit')->withType($type);
    }

    public function postCreate($type)
    {
        return Supply::createSupply($type);
    }

    public function getEdit($id)
    {
        $supply = Supply::get($id);

        if ($supply->supply->user_id != User::user()->id) {
            return view('errors.common')->withErrors('只能编辑自己发布的信息');
        }

        return view('supply.supply_edit')
            ->withSupply($supply)
            ->withType(strtolower($supply->type->code));
    }

    public function postEdit($id)
    {
        return Supply::editSupply($id);
    }

    public function page($type)
    {
        $query = request()->except('page');

        $supplies = Supply::getPage($type);

        return view('supply.supply_page')
            ->withSupplies($supplies)
            ->withType($type)
            ->withQuery($query);
    }

    public function cancel()
    {

    }

    public function close()
    {

    }
}