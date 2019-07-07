<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DistrictTableSeeder::class);
        $this->call(ThanaTableSeeder::class);
        $this->call(MenuTableSeeder::class);
        $this->call(MenuItemTableSeeder::class);
        $this->call(MerchantTypeTableSeeder::class);
        $this->call(ResponsibilityTableSeeder::class);
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(LocationTypeTableSeeder::class);
        $this->call(UserTableSeeder::class);



    }
}
