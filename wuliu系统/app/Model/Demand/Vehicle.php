<?php

namespace App\Model\Demand;

use App\Model\Type;
use App\Model\User;
use App\Model\Demand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Vehicle extends Model
{
	// 数据库表的名称
	protected $table = 'demand_vehicle'; 

    // 保护字段，不能直接用create或者new来更新
	protected $guarded = ['id','demand','type_id'];

    // 允许更新的字段
	protected $fillable = ['from','to','price','price_type','class','use',
            'phone','driver','contacts','zone',
    ];

	// 更新主表的时间戳updated_at和created_at
	protected $touches = ['demand'];

	protected $perpage = 5;

    // 关闭时间戳
	public $timestamps = false;

	public function demand(){
		return $this->belongsTo(Demand::class,'demand_id');
	}

	public function type(){
		return $this->belongsTo(Type::class, 'type_id');
	}

    public static function createDemand(){
    	$validator  = self::validator();
    	if($validator->fails()){
    		return back()->withErrors($validator->errors())->withInput();
    	}

    	DB::transaction(function() use(&$vehicle){
    		$demand = Demand::create([
    			'type_id' 	=>	 2,
    			'title'		=>	request('title'),
    			'user_id'	=>	User::user()->id,
				'stage'     => 2,
    		]);

    		$vehicle = new self(request()->all());
    		$vehicle = $demand->vehicle()->save($vehicle);
    	});

    	if ($vehicle !=null) {
    		return redirect('user/demand');
    	}else {
    		return back()->withErrors('创建失败')->withInput();
    	}
    }

    public static function editDeamnd($demand){
    	$validator = self::validator();
    	if($validator->fails()){
    		return back()->withErrors($validator->errors())->withInput();
    	}

    	DB::transaction(function() use(&$demand){
    		$demand ->demand->update([
    			'title'		=>request('title'),
    		]);

    		$demand->update(request()->all());
    	});

    	if ($vehicle != null) {
            return redirect('user/demand');
        } else {
            return back()->withErrors('创建失败')->withInput();
        }

    }

    public static function getPage(){
        $wheres = array_filter(request()->only(['zone','class']));

        $title = request('title');
        $order = explode('-',request('orderBy'));

        if(empty($title)){
            $demands = self::join('demand','demand_id','=','demand.id')
                    ->where($wheres);
        }else {
            $demands = self::join('demand','demand_id','=','demand.id')
                    ->where($wheres)
                    ->where('title' ,'like' , '%'. $title .'%');
        }

        $price = explode('-',request('price'));
        if (isset($price[1])) {
            if (! empty($price[0])) {
                $demands->where('price','>', (int)$price[0]);
            }
            if (! empty($price[1])){
                $demands->where('price','<=',(int)$price[1]);
            }
        }

        $order_allow = ['created_at', 'price'];
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
    	$validator = Validator::make(request()->all(),[
    		'title'     =>      'required|max:50',
            'zone'      =>      'required',
    		'from'		=>		'required|date',
    		'to'		=>		'required|date',
    		'price'		=>		'required|numeric',
    		'class'     =>		'required|max:255',
    		'use' 		=>		'required',
            'driver'    =>      'required',
            'phone'     =>  	'required',
            'contacts'  =>  	'required',
            'agree'		=>		'required',
    	],[
    		'title.*'           => '请填写标题，长度不超过50',
            'zone.*'            => '请填写区域',
    		'from.*'			=> '请填写出发时间',
    		'to.*'				=> '请填写到达时间',
    		'class.*'           => '请填写车辆类型',
    		'price.*'           => '请填写价格，请输入数字',
    		'use.*'				=> '请选择车辆用途',
            'driver.*'          => '请选择是否带司机',
            'phone.*'           => '请填写电话号码',
            'contacts.*'        => '请填写联系人',
            'agree.*'           => '请阅读并同意《车辆需求相关条款》',
    	]);
    	return $validator;
    }
}
