<?php

namespace najmulcse\laraplusadmin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LocationType extends Model
{
    use SoftDeletes;
    protected $guarded = [""];
    protected $softDelete = true;

    public function location()
    {
        return $this->belongsTo(Location::class,'location_type_id','id');
    }

}
