<?php


namespace najmulcse\laraplusadmin\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thana extends Model
{
    use SoftDeletes;
    protected $table = "thanas";
    protected $guarded = [""];
    protected $softDelete = true;
    public function location()
    {
        return $this->belongsTo(Location::class,'thana_id','id');
    }
}