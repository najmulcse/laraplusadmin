<?php

namespace najmulcse\laraplusadmin\Models;

use najmulcse\laraplusadmin\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Merchant extends Model
{
    use SoftDeletes;
    protected $guarded = [""];
    protected $softDelete = true;
    public function employees()
    {
        return $this->hasMany(User::class);
    }

    public function location()
    {
        return $this->hasOne(Location::class);
    }
    public function mtype()
    {
        return $this->belongsTo(MerchantType::class);
    }
}
