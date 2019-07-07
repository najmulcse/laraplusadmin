<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class BaseController extends Controller
{
    public function storeRoleAndPermission()
    {
        $allRoles = ["Sign", "Menu", "Role", "Merchant Type", "Merchant", "Business Profile", "Location Type", "Location", "Employee", "My Profile", "Setting"];

        $jsonString = file_get_contents(base_path('database/roles_permission.json'));

        $data = json_decode($jsonString, true);
        dd($data);
        foreach ($data as $key => $permissions)
        {
            $role = Role::create(['name' => $key, 'guard_name'=> 'web','created_by' => Auth::id()]);
            foreach ($permissions as $permission)
            {

                $p = Permission::create([
                    'name' => $permission['name'],
                    'url' => $permission['url'],
                    'route' => $permission['route'] == "NULL" ? NULL:$permission['route'],
                    'guard_name' => "web"
                ]);

                $role->givePermissionTo($p);
            }

        }
    }
}
