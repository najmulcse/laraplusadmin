<?php
/**
 * Created by PhpStorm.
 * User: NAJMUL AHMED
 * Date: 4/1/2019
 * Time: 9:13 PM
 */

use App\Models\Responsibility;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // create Url group (roles)
        try{
            $jsonString = file_get_contents(base_path('database/roles_permission.json'));

        }catch (FileNotFoundException $e){
            print($e);
        }

        $data = json_decode($jsonString, true);

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
            $responsibility = Responsibility::findOrFail(1);
            $responsibility->roles()->attach($role);
        }


    }
}