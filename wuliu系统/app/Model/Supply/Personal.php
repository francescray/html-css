<?php

namespace App\Model\Supply;

use App\Model\Supply;
use App\Model\Type;
use App\Model\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Personal extends Model
{
    // 数据库表的名称
    protected $table = 'supply_personal';

    // 保护字段，不能直接用create或者new来更新
    protected $guarded = ['id', 'supply', 'type_id'];

    // 允许更新的字段
    protected $fillable = [
        'zone', 'address', 'class', 'num', 'age_min', 'age_max', 'working_age',
        'education', 'working_time', 'price', 'price_type', 'phone',
        'contacts', 'benefits', 'company', 'job',
    ];

    // 更新主表的时间戳updated_at和created_at
    protected $touches = ['supply'];

    // 设置
    protected $casts = [
        'benefits'  => 'array',
    ];

    protected $perPage = 10;

    // 关闭时间戳
    public $timestamps = false;

    public function supply()
    {
        return $this->belongsTo(Supply::class, 'supply_id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public static function createSupply()
    {
        $validator = self::validator();
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        DB::transaction(function() use (&$personal) {
            $supply = Supply::create([
                'type_id'   => 3,
                'title'     => request('title'),
                'user_id'   => User::user()->id,
                'desc'      => request('desc'),
                'stage'     => 2,
            ]);

            $personal = new self(request()->all());

            $personal = $supply->personal()->save($personal);
        });

        if ($personal != null) {
            return redirect('user/supply');
        } else {
            return back()->withErrors('创建失败')->withInput();
        }
    }

    public static function editSupply($supply)
    {
        $validator = self::validator();
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        DB::transaction(function() use (&$supply) {
            $supply->supply->update([
                'title'     => request('title'),
                'desc'      => request('desc'),
            ]);

            $supply->update(request()->all());
        });

        if ($supply != null) {
            return redirect('user/supply');
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
            $supplies = self::join('supply', 'supply_id', '=', 'supply.id')
                ->where($wheres);
        } else {
            $supplies = self::join('supply', 'supply_id', '=', 'supply.id')
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
            $supplies->orderBy($order[0], $tmp);
        }

        return $supplies->paginate();
    }

    public static function validator()
    {
        $validator = Validator::make(request()->all(), [
            'title'         => 'required|max:50',
            'company'       => 'required',
            'zone'          => 'required',
            'address'       => 'required',
            'job'           => 'required|max:45',
            'class'         => 'required|max:255',
            'num'           => 'required|numeric',
            'age_min'       => 'required',
            'age_max'       => 'required|numeric',
            'working_age'   => 'required',
            'education'     => 'required',
            'working_time'  => 'required',
            'price'         => 'required|numeric',
            'phone'         => 'required',
            'contacts'      => 'required',
            'agree'         => 'required',
        ], [
            'title.*'           => '请填写标题，长度不超过50',
            'company.*'         => '请填写企业全名',
            'zone.*'              => '请填写所在区域',
            'address.*'         => '请填写详细地址',
            'job.*'             => '请填写招聘职位',
            'class.*'           => '请填写职业类型',
            'num.*'             => '请填写人员数量',
            'age_min.*'         => '请填写年龄范围最小',
            'age_max.*'         => '请填写年龄范围最大',
            'working_age.*'     => '请填写工作年限',
            'education.*'       => '请填写学历',
            'working_time.*'    => '请填写上岗时间',
            'price.*'           => '请填写劳务费用',
            'phone.*'           => '请填写手机/电话',
            'contacts.*'        => '请填写联系人',
            'agree.*'           => '请阅读并同意《人员供应相关条款》',
        ]);

        return $validator;
    }
}
