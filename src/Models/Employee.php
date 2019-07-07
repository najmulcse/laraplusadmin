<?php

namespace najmulcse\laraplusadmin\Models;


use Illuminate\Database\Eloquent\Model;
use najmulcse\laraplusadmin\Models\Location;
use najmulcse\laraplusadmin\Models\Merchant;
use najmulcse\laraplusadmin\Models\Responsibility;
use najmulcse\laraplusadmin\Http\Permissions\HasPermissionsTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class Employee extends Authenticatable
{
    use Notifiable, HasRoles, SoftDeletes, HasPermissionsTrait;

    protected $table = 'employees';
    protected $softDelete = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [""];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'id');
    }

    public function responsibilities()
    {
        return $this->belongsToMany(Responsibility::class, 'employee_responsibility', 'employee_id', 'responsibility_id');
    }


}
