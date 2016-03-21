<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cooperation extends Model
{
    protected $table = 'cooperation';

    protected $guarded = ['id'];

    public function supply()
    {
        return $this->belongsTo(Supply::class, 'supply_id');
    }

    public function demand()
    {
        return $this->belongsTo(Demand::class, 'demand_id');
    }

    public function getResAttribute()
    {
        if ($this->type == 'supply') {
            return $this->supply;
        } elseif ($this->type == 'demand') {
            return $this->demand;
        } else {
            return null;
        }
    }
}
