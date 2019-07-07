<?php
/**
 * Created by PhpStorm.
 * User: NAJMUL AHMED
 * Date: 4/1/2019
 * Time: 9:05 PM
 */

namespace najmulcse\laraplusadmin\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;
    protected $guarded = [""];
    protected $guard_name = 'web';
    protected $softDelete = true;

    public function roles() {
        return $this->belongsToMany(Role::class,'permission_role');
    }

    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class,'id','permission_id');
    }

}