<?php

namespace najmulcse\laraplusadmin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use SoftDeletes;

    protected $table = "districts";
    protected $guarded = [""];
    protected $softDelete = true;


}
