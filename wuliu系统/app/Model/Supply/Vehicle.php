<?php

namespace App\Model\Supply;

use App\Model\Type;
use App\Model\User;
use App\Model\Supply;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class Vehicle extends Model
{	
	// 数据库表的名称
    protected $table = 'supply_vehicle';

    // 保护字段，不能直接用create或者new来更新
    protected $guarded = ['id', 'supply', 'type_id'];

    // 允许更新的字段
    protected $fillable = [
        'zone','class','length','load','load_type','price','price_type',
        'phone','contacts',
    ];

    // 更新主表的时间戳updated_at和created_at
    protected $touches = ['supply'];

	protected $perPage = 10;

    // 关闭时间戳
    public $timestamps = false;

    public function supply(){
    	return $this->belongsTo(Supply::class, 'supply_id');
    }

    public function type(){
    	return $this->belongsTo(Type::class, 'type_id');
    }

    public static function createSupply(){
    	$validator = self::validator();
    	if($validator->fails()){
    		return back()->withErrors($validator->errors())->withInput();
    	}

        DB::transaction(function() use(&$vehicle) {
            $supply = Supply::create([
                'type_id'   => 2,
                'title'     =>request('title'),
                'images'    =>request('images'),
                'user_id'   =>User::user()->id,
                'desc'      =>request('desc'),
                'stage'     => 2,
            ]);

            $vehicle = new self(request()->all());
            $vehicle = $supply->vehicle()->save($vehicle);
        });

        if ($vehicle != null) {
            return redirect('user/supply');
        } else {
            return back()->withErrors('创建失败')->withInput();
        }
    }

    public function editSupply($supply){
        $validator = self::validator();
        if($validator->fails()){
            return back()->withErrors($validator->errors())->withInput();
        }

        DB::tansaction(function() use(&$supply) {
            $supply ->supply->update([
                'title' => request('title'),
                'images' => request('images'),
                'desc'  => request('desc'),
            ]);

            $supply->update(request()->all());
        });

        if ($supply != null ) {
            return redirect('user/supply');
        } else {
            return back()->withErrors('创建失败')->withInput();
        }

    }

    public static function getPage(){
        $wheres = array_filter(request()->only(['zone','class']));

        $title = request('title');
        $order = explode('-',request('orderBy'));

        if(empty($title)){
            $supplies = self::join('supply','supply_id','=','supply.id')
                    ->where($wheres);
        }else {
            $supplies = self::join('supply','supply_id','=','supply.id')
                    ->where($wheres)
                    ->where('title' ,'like' , '%'. $title .'%');
        }

        $price = explode('-',request('price'));
        if (isset($price[1])) {
            if (! empty($price[0])) {
                $supplies->where('price','>', (int)$price[0]);
            }
            if (! empty($price[1])){
                $supplies->where('price','<=',(int)$price[1]);
            }
        }

        $order_allow = ['created_at', 'price'];
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

    public static function validator(){
        $validator = Validator::make(request()->all(), [
            'title'             => 'required|max:50',
            'zone'              => 'required',
            'class'             => 'required|max:255',
            'length'            => 'required',
            'load'              => 'required|numeric',
            'price'             => 'required|numeric',
            'gearbox'           => 'required',
            'age'               => 'required|numeric',
            'desc'              => 'max:255',
            'phone'             => 'required',
            'contacts'          => 'required',
            'agree'             => 'required',
        ], [
            'title.*'             => '请填写标题，长度不超过50',
            'zone.*'              => '请填写区域',
            'class.*'             => '请填写车辆类型',
            'length.*'            => '请填写车辆长度',
            'load.*'              => '请填写车辆装载，请输入数字',
            'price.*'             => '请填写价格，请输入数字',
            'phone.*'             => '请填写电话号码',
            'contacts.*'          => '请填写联系人',
            'agree.*'             => '请阅读并同意《车辆供应相关条款》',
            'gearbox.*'           => '请填写变速箱类型',
            'age.*'               => '请填写车龄，请输入数字',
            'desc.*'              => '补充说明不能超过255个字',
        ]);
        return $validator;
    }
}
