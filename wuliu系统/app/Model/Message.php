<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected  $table = 'message';
    
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function supply()
    {
        return $this->belongsTo(Supply::class, 'supply_id');
    }

    public function demand()
    {
        return $this->belongsTo(Demand::class, 'demand_id');
    }

}
