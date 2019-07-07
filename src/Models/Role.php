<?php
/**
 * Created by PhpStorm.
 * User: NAJMUL AHMED
 * Date: 4/1/2019
 * Time: 9:04 PM
 */

namespace najmulcse\laraplusadmin\Models;


use najmulcse\laraplusadmin\Models\Responsibility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;
    protected $guarded = [""];
    protected $guard_name = 'web';
    protected $softDelete = true;
    public function permissions() {
        return $this->belongsToMany(Permission::class,'permission_role');
    }

    public function type()
    {
        return $this->belongsTo(MerchantType::class,'merchant_type_id','id');
    }

    public function responsibilities()
    {
        return $this->belongsToMany(Responsibility::class,'responsibility_role');
    }

    public function role(){
        return $this->belongsTo(Permission::class, 'role_id','permission_id','permission_role');
    }

}