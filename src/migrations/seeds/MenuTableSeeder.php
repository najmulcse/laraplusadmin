<?php


use App\Models\Menu;
use App\User;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu1 = new Menu();
        $menu1->title = "Admin Menus";
        $menu1->created_by = 1;
        $menu1->save();

    }
}
