<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    protected  $table = 'demand';

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
        return $this->belongsTo(Type::class, 'user_id');
    }

    public function warehouse()
    {
        return $this->hasOne(Demand\Warehouse::class, 'demand_id');
    }

    public function vehicle()
    {
        return $this->hasOne(Demand\Vehicle::class, 'demand_id');
    }

    public function personal()
    {
        return $this->hasOne(Demand\Personal::class, 'demand_id');
    }

    public function building()
    {
        return $this->hasOne(Demand\Building::class, 'demand_id');
    }

    public function general()
    {
        return $this->hasOne(Demand\General::class, 'demand_id');
    }

    public function cooperations()
    {
        return $this->hasMany(Cooperation::class, 'supply_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'demand_id');
    }

    public static function get($id)
    {
        $demand = parent::find($id);

        if ($demand == null) {
            return null;
        }

        switch ($demand->type_id) {
            case 1:
                $instance = $demand->warehouse;
                break;
            case 2:
                $instance = $demand->vehicle;
                break;
            case 3:
                $instance = $demand->personal;
                break;
            case 4:
                $instance = $demand->building;
                break;
            case 5:
                $instance = $demand->general;
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
                $demands = Demand\Warehouse::getPage();
                break;
            case 'vehicle':
                $demands = Demand\Vehicle::getPage();
                break;
            case 'personal':
                $demands = Demand\Personal::getPage();
                break;
            case 'building':
                break;
            case 'general':
                break;
            default:
                $demands = null;
        }

        return $demands;
    }

    public static function createDemand($type)
    {
        switch ($type) {
            case 'warehouse':
                return Demand\Warehouse::createDemand();
                break;
            case 'vehicle':
                return Demand\Vehicle::createDemand();
                break;
            case 'personal':
                return Demand\Personal::createDemand();
                break;
            case 'building':
                break;
            case 'general':
                break;
            default:
                return back()->withInput();
        }
    }

    public static function editDemand($id)
    {
        $demand = self::get($id);

        if ($demand == null) {
            return back()->withInput();
        }

        if ($demand->demand->user_id != User::user()->id) {
            return view('errors.common')->withErrors('只能编辑自己发布的信息');
        }

        $type = $demand->type->code;

        switch ($type) {
            case 'warehouse':
                return Demand\Warehouse::editDemand($demand);
                break;
            case 'vehicle':
                return Demand\Vehicle::editDemand($demand);
                break;
            case 'personal':
                return Demand\Personal::editDemand($demand);
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
