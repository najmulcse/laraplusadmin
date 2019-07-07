<?php


namespace najmulcse\laraplusadmin\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Location extends Model
{
    use SoftDeletes;
    protected $guarded = [""];
    protected $softDelete = true;

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
    public function thana()
    {
        return $this->hasOne(Thana::class,'id','thana_id');
    }
    public function lType()
    {
        return $this->hasOne(LocationType::class,'id','location_type_id');
    }

}