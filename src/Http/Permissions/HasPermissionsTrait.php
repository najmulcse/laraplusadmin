<?php
/**
 * Created by PhpStorm.
 * User: NAJMUL AHMED
 * Date: 3/30/2019
 * Time: 2:16 PM
 */

namespace najmulcse\laraplusadmin\Http\Permissions;

use App\User;
use Illuminate\Support\Facades\Auth;

trait HasPermissionsTrait {

    public function hasPermission($permissionId): bool
    {

        $user = $this::with('responsibilities.roles.permissions')->where('id', Auth::id())->first();
        $roles = $user->responsibilities[0]->roles;
        if(!is_null($roles)){
            foreach ($roles as $role)
            {
                foreach ($role->permissions as $permission)
                {
                    if($permission->id == $permissionId || $permission->route == $permissionId){
                        return true;
                    }
                }

            }
        }
        return false;

    }
}
