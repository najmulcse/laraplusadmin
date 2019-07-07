<?php


namespace najmulcse\laraplusadmin\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes;
    protected $guarded = [""];
    protected $softDelete = true;
    public function submenu()
    {
        return $this->hasMany(MenuItem::class);
    }

}