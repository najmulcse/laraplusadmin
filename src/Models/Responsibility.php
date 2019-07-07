<?php

namespace najmulcse\laraplusadmin\Models;

use najmulcse\laraplusadmin\Models\MerchantType;
use najmulcse\laraplusadmin\Models\Role;
use najmulcse\laraplusadmin\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Responsibility extends Model
{

    use SoftDeletes;
    protected $guarded = [""];
    protected $softDelete = true;

    public function roles() {
        return $this->belongsToMany(Role::class,'responsibility_role');
    }
    public function mTypes() {
        return $this->belongsToMany(MerchantType::class,'mtype_responsibility','responsibility_id','mtype_id');
    }
    public function employee() {
        return $this->belongsTo(Employee::class,'employee_id','responsibility_id','employee_responsibility');
    }
}
