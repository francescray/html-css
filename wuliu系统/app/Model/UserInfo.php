<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $primaryKey = 'user_id';

    protected $table = 'user_info';

    protected $guarded = ['id'];

    // 关闭时间戳
    public $timestamps = false;
}
