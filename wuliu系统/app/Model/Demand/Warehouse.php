<?php

namespace App\Model\Demand;

use App\Model\Type;
use App\Model\User;
use App\Model\Demand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Warehouse extends Model
{
    protected $table = 'demand_warehouse';

    protected $guarded = ['id','demand','type_id'];

    protected $fillable = [
    	'zone', 'address', 'class', 'acreage','near',
        'price', 'phone', 'price_type',
        'contacts', 
        ];

    protected $touches = ['demand'];

    protected $perpage = 5;

    // 关闭时间戳
    public $timestamps = false;

    public function demand(){
    	return $this->belongsTo(Demand::class , 'demand_id');
    }

    public function type(){
    	return $this->belongsTo(Type::class,'type_id');
    }

    public static function createDemand(){
    	$validator = self::validator();
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

    	DB::transaction(function() use(&$warehouse){
    		$demand = Demand::create([
    			'type_id'	=>	1,
    			'title' 	=>	request('title'),
    			'user_id'   => User::user()->id,
    			'desc'      => request('desc'),
                'stage'     => 2,
    		]);

    		$warehouse = new self(request()->all());
    		$warehouse = $demand->warehouse()->save($warehouse);
    	});

    	if ($warehouse != null) {
    		return redirect('user/demand');
    	}else {
    		return back()->withErrors('创建失败')->withInput();
    	}
    }

    public static function editDemand($demand){
    	$validator = self::validator();
    	if($validator->fails()){
    		return back()->withErrors($validator->errors())->withInput();
    	}

    	DB::transaction(function() use(&$demand){
    		$demand->demand->update([
    			'title'		=>  request('title'),
    			'desc'		=>	request('desc'),
    		]);
    		$demand->update(request()->all());
    	});

    	if ($demand != null) {
    		return redirect('user/demand');
    	}else {
    		return back()->withErrors('创建失败')->withInput();
    	}

    }

    public static function getPage(){
        $wheres = array_filter(request()->only(['zone', 'class']));

        $title = request('title');
        $order = explode('-',request('orderBy'));

        if (empty($title)) {
            $demands = self::join('demand','demand_id','=','demand.id')
                ->where($wheres);
        } else {
            $demands = self::join('demand','demand_id', '=','demand.id')
                ->where($wheres)
                ->where('title', 'like', '%' . $title . '%');
        }

        // 价格区间的处理
        $price = explode('-', request('price'));
        if (isset($price[1])) {
            if (! empty($price[0])) {
                $demands->where('price', '>', (int) $price[0]);
            }
            if (! empty($price[1])) {
                $demands->where('price', '<=', (int) $price[1]);
            }
        }

        $order_allow = ['created_at', 'price', 'acreage'];
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

    public static function validator(){
    	$validator = Validator::make(request()->all(), [
    		'title'         => 'required|max:50',
            'zone'          => 'required',
            'address'       => 'required',
            'class'         => 'required|max:255',
            'acreage'       => 'required|numeric',
            'price'         => 'required|numeric',
            'phone'         => 'required',
            'contacts'     => 'required',
            'desc'          => 'max:255',
            'agree'         => 'required',
    	],[
    		'title.*'       => '请填写标题，长度不超过50',
            'zone.*'        => '请填写区域',
            'address.*'     => '请填写详细位置',
            'class.*'       => '请填写仓库类型',
            'acreage.*'     => '请填写仓库面积，请输入数字',
            'price.*'       => '请填写仓库价格，请输入数字',
            'phone.*'       => '请填写手机/电话',
            'contacts.*'    => '请填写联系人',
            'desc.*'        => '补充说明不能超过255个字',
            'agree.*'       => '请阅读并同意《仓库需求相关条款》',
    	]);

    	return $validator;
    }
}
