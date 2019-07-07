<?php

namespace najmulcse\laraplusadmin\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MerchantType extends Model
{
    use SoftDeletes;
    protected $guarded = [""];

    protected $table = "mtypes";
    protected $softDelete = true;
    public function responsibilities()
    {
        return $this->belongsToMany(Responsibility::class,'mtype_responsibility','mtype_id','responsibility_id');
    }

    public function merchant()
    {
        return $this->hasOne(Merchant::class,'mtype_id','id');
    }
}
