<?php

namespace App\Http\Controllers;

use App\Http\Responses\API;
use App\Model\Message;
use App\Model\Demand;
use App\Model\Supply;
use App\Model\User;

class MessageController extends Controllers{

	public function supply($id){
		$supply = Supply::find($id);

		if($supply == null){
			return API::error([1002, '没有该供应信息']);
		}

		$use = User::user();
		if ($supply->user_id == $user->id) {
            return API::error([1003, '不能给自己创建的供应发送留言']);
        }

        $message = Message::create([
        	'user_id'   => $user->id,
            'type'      => 'supply',
            'supply_id' => $supply->id,
            'demand_id' => null,
            'title'     => request('title'),
        ]);

        if ($message == null) {
            return API::error([1004, '发送意向失败']);
        }

        return API::success();
	}

}