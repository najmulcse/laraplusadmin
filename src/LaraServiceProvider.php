<?php

namespace  najmulcse\laraplusadmin;

use Illuminate\Support\ServiceProvider;

/**
 * Created by PhpStorm.
 * User: M. Najmul Ahmed
 * Date: 7/4/2019
 * Time: 12:22 PM
 */

class LaraServiceProvider extends ServiceProvider
{
    /**
     *
     */
    public function boot()
    {
        // Loading routes file
        require __DIR__ . '/routes.php';


        $this->publishes([
            __DIR__ . '/views' => resource_path('views/vendor/laraplusadmin')
        ]);

        $this->publishes([
            __DIR__ . '/config' => config_path()
        ]);
        $this->publishes([
            __DIR__ . '/assets' => public_path()
        ]);
//        $this->publishes([
//                    __DIR__ . '/Http/Middlewares/RoutePermission.php' => app_path('Http/Middleware/RoutePermission.php')
//                ]);

//        $this->publishes([
//                    __DIR__ . '/Http/Permissions/HasPermissionsTrait.php' => app_path('Permissions/HasPermissionsTrait.php')
//                ]);
        $this->publishes([
            __DIR__ . '/migrations/2019_04_02_160805_create_menus_types_table.php' => base_path('database/migrations/2019_04_02_160805_create_menus_types_table.php'),
            __DIR__ . '/migrations/2019_04_02_160833_create_menu_items_types_table.php' => base_path('database/migrations/2019_04_02_160833_create_menu_items_types_table.php'),
            __DIR__ . '/migrations/2019_04_22_000000_create_mtypes_table.php' => base_path('database/migrations/2019_04_22_000000_create_mtypes_table.php'),
            __DIR__ . '/migrations/2019_04_22_000001_create_merchants_table.php' => base_path('database/migrations/2019_04_22_000001_create_merchants_table.php'),
            __DIR__ . '/migrations/2019_04_22_000003_create_location_types_table.php' => base_path('database/migrations/2019_04_22_000003_create_location_types_table.php'),
            __DIR__ . '/migrations/2019_04_22_000004_create_locations_table.php' => base_path('database/migrations/2019_04_22_000004_create_locations_table.php'),
            __DIR__ . '/migrations/2019_04_22_000005_create_permission_tables.php' => base_path('database/migrations/2019_04_22_000005_create_permission_tables.php'),
            __DIR__ . '/migrations/2019_04_22_000006_create-responsibility_table.php' => base_path('database/migrations/2019_04_22_000006_create-responsibility_table.php'),
            __DIR__ . '/migrations/2019_04_22_000007_create-responsibility_role_table.php' => base_path('database/migrations/2019_04_22_000007_create-responsibility_role_table.php'),
            __DIR__ . '/migrations/2019_04_22_000008_create_mtype_responsibility_table.php' => base_path('database/migrations/2019_04_22_000008_create_mtype_responsibility_table.php'),
            __DIR__ . '/migrations/2019_04_27_000000_create_districts_table.php' => base_path('database/migrations/2019_04_27_000000_create_districts_table.php'),
            __DIR__ . '/migrations/2019_04_27_000001_create_thanas_table.php' => base_path('database/migrations/2019_04_27_000001_create_thanas_table.php'),
            __DIR__ . '/migrations/2019_05_09_000002_create_employees_table.php' => base_path('database/migrations/2019_05_09_000002_create_employees_table.php'),
            __DIR__ . '/migrations/2019_05_12_152746_create_employee_responsibility_table.php' => base_path('database/migrations/2019_05_12_152746_create_employee_responsibility_table.php'),
            __DIR__ . '/migrations/files/roles_permission.json' => base_path('database/roles_permission.json'),
            __DIR__ . '/migrations/files/menu_submenu.json' => base_path('database/menu_submenu.json'),

        ], '');
        $this->loadViewsFrom(__DIR__ . '/views', 'laraplusadmin');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/laraplus.php', 'laraplus');
    }

}