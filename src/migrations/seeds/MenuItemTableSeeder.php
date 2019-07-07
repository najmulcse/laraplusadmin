<?php


use App\Models\Menu;
use App\Models\MenuItem;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class MenuItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jsonString = file_get_contents(base_path('database/menu_submenu.json'));

        $data = json_decode($jsonString, true);

        foreach ($data as  $menuItem)
        {

                MenuItem::create([
                    'title' => $menuItem['title'],
                    'menu_id' => $menuItem['menu_id'],
                    'parent_id' => $menuItem['parent_id'] ,
                    'order_by' => $menuItem['order_by'],
                    'icon_class' => $menuItem['icon_class'],
                    'permission_id' => $menuItem['permission_id'],
                    'created_by' => Auth::id()
                ]);

        }

    }
}
