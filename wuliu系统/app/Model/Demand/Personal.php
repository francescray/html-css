<?php

namespace App\Model\Demand;

use App\Model\Type;
use App\Model\Demand;
use App\Model\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Personal extends Model
{
    // 数据库表的名称
    protected $table = 'demand_personal';

    // 保护字段，不能直接用create或者new来更新
    protected $guarded = ['id', 'demand', 'type_id'];

    // 允许更新的字段
    protected $fillable = [
        'class','name','sex','birth_day',
    	'working_age','education','price','price_type', 'benefits' ,'phone','zone',
    ]; 

    // 更新主表的时间戳updated_at和created_at
    protected $touches = ['demand'];

    // 设置
    protected $casts = [
        'benefits'  => 'array',
    ];

    protected $perPage = 10;

    // 关闭时间戳
    public $timestamps = false;

    public function demand()
    {
        return $this->belongsTo(Demand::class, 'demand_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public static function createDemand(){
    	$validator = self::validator();
    	if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        DB::transaction(function() use (&$personal) {
            $demand = Demand::create([
                'type_id'   => 3,
                'title'     => request('title'),
                'user_id'   => User::user()->id,
                'desc'      => request('desc'),
                'stage'     => 2,
            ]);

            $personal = new self(request()->all());

            $personal = $demand->personal()->save($personal);
        });

        if ($personal != null) {
            return redirect('user/demand');
        } else {
            return back()->withErrors('创建失败')->withInput();
        }
    }

    public static function editDemand($demand)
    {
        $validator = self::validator();
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        DB::transaction(function() use (&$demand) {
            $demand->demand->update([
                'title'     => request('title'),
                'desc'      => request('desc'),
            ]);

            $demand->update(request()->all());
        });

        if ($demand != null) {
            return redirect('user/demand');
        } else {
            return back()->withErrors('创建失败')->withInput();
        }
    }

    public static function getPage()
    {
        $wheres = array_filter(request()->only(['zone', 'class', 'education']));

        $title = request('title');
        $order = explode('-', request('orderBy'));

        if (empty($title)) {
            $demands = self::join('demand', 'demand_id', '=', 'demand.id')
                ->where($wheres);
        } else {
            $demands = self::join('demand', 'demand_id', '=', 'demand.id')
                ->where($wheres)
                ->where('title', 'like', '%' . $title . '%');
        }

        $order_allow = ['created_at'];
        if (in_array($order[0], $order_allow)) {
            if (isset($order[1]) && $order[1] == 'asc') {
                $tmp = 'asc';
            } else {
                $tmp = 'desc';
            }
            $demands->orderBy($order[0], $tmp);
        }

        return $demands->paginate();
    }

    public static function validator()
    {
        $validator = Validator::make(request()->all(), [
            'title'         => 'required|max:50',
            'class'         => 'required|max:255',
            'name'			=> 'required|max:50',
            'sex'			=> 'required',
            'birth_day'	    => 'required',
            'working_age'   => 'required',
            'education'     => 'required',
            'zone'          => 'required',
            'price'         => 'required|numeric',
            'phone'         => 'required',
            'agree'         => 'required',
        ], [
            'title.*'           => '请填写标题，长度不超过50',
            'class.*'           => '请填写职业类型',
            'name.*'            => '请填写姓名，长度不超过50',
            'sex.*'         	=> '请填写性别',
            'birth_day.*'       => '请填写出生日期',
            'working_age.*'     => '请填写工作年限',
            'education.*'       => '请填写学历',
            'zone.*'            => '请填写区域',
            'price.*'           => '请填写期望薪水',
            'phone.*'           => '请填写手机/电话',
            'agree.*'           => '请阅读并同意《人员需求相关条款》',
        ]);

        return $validator;
    }

}
