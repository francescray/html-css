<?php

namespace App\Http\Controllers;

use App\Http\Responses\API;
use App\Model\Cooperation;
use App\Model\Demand;
use App\Model\Supply;
use App\Model\User;

class CooperationController extends Controller
{
    public function page($type)
    {
        $user = User::user();

        if ($type == 'send') {
            $coops = Cooperation::where('user_send', $user->id)->paginate();
            return view('user.cooperation_send')->withCoops($coops);
        } else {
            $coops = Cooperation::where('user_recv', $user->id)->paginate();
            return view('user.cooperation_recv')->withCoops($coops);
        }
    }

    public function supply($id)
    {
        $supply = Supply::find($id);
        if ($supply == null) {
            return API::error([1002, '没有该供应信息']);
        }

        $user = User::user();
        if ($supply->user_id == $user->id) {
            return API::error([1003, '不能给自己创建的供应发送意见']);
        }

        $coop = Cooperation::create([
            'user_send' => $user->id,
            'user_recv' => $supply->user_id,
            'type'      => 'supply',
            'supply_id' => $supply->id,
            'demand_id' => null,
            'phone'     => request('phone'),
            'contacts'  => request('contacts'),
            'content'   => request('content'),
        ]);

        if ($coop == null) {
            return API::error([1004, '发送意向失败']);
        }

        return API::success();
    }

    public function demand($id)
    {
        $demand = Demand::find($id);
        if ($demand == null) {
            return API::error([1002, '没有该需求信息']);
        }

        $user = User::user();
        if ($demand->user_id == $user->id) {
            return API::error([1003, '不能给自己创建的需求发送意见']);
        }

        $coop = Cooperation::create([
            'user_send' => $user->id,
            'user_recv' => $demand->user_id,
            'type'      => 'demand',
            'demand_id' => $demand->id,
            'supply_id' => null,
            'phone'     => request('phone'),
            'contacts'  => request('contacts'),
            'content'   => request('content'),
        ]);

        if ($coop == null) {
            return API::error([1004, '发送意向失败']);
        }

        return API::success();
    }
}