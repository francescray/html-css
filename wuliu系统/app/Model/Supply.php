<?php

namespace App\Model;

use App\Model\Supply\Personal;
use Illuminate\Database\Eloquent\Model;
use App\Model\User;

class Supply extends Model
{
    protected $table = 'supply';

    protected $guarded = ['id'];

    // 设置
    protected $casts = [
        'images'    => 'array',
    ];

    protected $perPage = 10;

    const   STAGE_SUBMIT        = 0;
    const   STAGE_PENDING       = 1;
    const   STAGE_PROCESSING    = 2;
    const   STAGE_SUCCESS       = 3;
    const   STAGE_CANCEL        = 4;

    protected $stageName = [
        self::STAGE_SUBMIT      => '已提交',
        self::STAGE_PENDING     => '审核中',
        self::STAGE_PROCESSING  => '进行中',
        self::STAGE_SUCCESS     => '已完成',
        self::STAGE_CANCEL      => '已取消',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function warehouse()
    {
        return $this->hasOne(Supply\Warehouse::class, 'supply_id');
    }

    public function vehicle()
    {
        return $this->hasOne(Supply\Vehicle::class, 'supply_id');
    }

    public function personal()
    {
        return $this->hasOne(Supply\Personal::class, 'supply_id');
    }

    public function building()
    {
        return $this->hasOne(Supply\Building::class, 'supply_id');
    }

    public function general()
    {
        return $this->hasOne(Supply\General::class, 'supply_id');
    }

    public function cooperations()
    {
        return $this->hasMany(Cooperation::class, 'supply_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'supply_id');
    }

    public static function get($id)
    {
        $supply = parent::find($id);

        if ($supply == null) {
            return null;
        }

        switch ($supply->type_id) {
            case 1:
                $instance = $supply->warehouse;
                break;
            case 2:
                $instance = $supply->vehicle;
                break;
            case 3:
                $instance = $supply->personal;
                break;
            case 4:
                $instance = $supply->building;
                break;
            case 5:
                $instance = $supply->general;
                break;
            default:
                $instance = null;
        }

        return $instance;
    }

    public static function getPage($type)
    {
        switch ($type) {
            case 'warehouse':
                $supplies = Supply\Warehouse::getPage();
                break;
            case 'vehicle':
                $supplies = Supply\Vehicle::getPage();
                break;
            case 'personal':
                $supplies = Supply\Personal::getPage();
                break;
            case 'building':
                break;
            case 'general':
                break;
            default:
                $supplies = null;
        }

        return $supplies;
    }

    public static function createSupply($type)
    {
        switch ($type) {
            case 'warehouse':
                return Supply\Warehouse::createSupply();
                break;
            case 'vehicle':
                return Supply\Vehicle::createSupply();
                break;
            case 'personal':
                return Supply\Personal::createSupply();
                break;
            case 'building':
                break;
            case 'general':
                break;
            default:
                return back()->withInput();
        }
    }

    public static function editSupply($id)
    {
        $supply = self::get($id);

        if ($supply == null) {
            return back()->withInput();
        }

        if ($supply->supply->user_id != User::user()->id) {
            return view('errors.common')->withErrors('只能编辑自己发布的信息');
        }

        $type = $supply->type->code;

        switch ($type) {
            case 'warehouse':
                return Supply\Warehouse::editSupply($supply);
                break;
            case 'vehicle':
            return Supply\Vehicle::editSupply($supply);
                break;
            case 'personal':
                return Supply\Personal::editSupply($supply);
                break;
            case 'building':
                break;
            case 'general':
                break;
            default:
                return back()->withInput();
        }
    }

    public function getFirstImageAttribute()
    {
        return isset($this->images[0]) ? $this->images[0] : 'static/img/page-pic.png';
    }

    public function getStageNameAttribute()
    {
        if (isset($this->stageName[$this->stage])) {
            return $this->stageName[$this->stage];
        }

        return null;
    }

    public function getCoopNumAttribute()
    {
        return $this->cooperations->count();
    }
}
