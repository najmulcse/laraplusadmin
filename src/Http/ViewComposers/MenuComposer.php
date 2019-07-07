<?php

namespace najmulcse\laraplusadmin\Http\ViewComposers;

use najmulcse\laraplusadmin\Models\MenuItem;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MenuComposer
{
    protected $menus;

    public function __construct()
    {

    }

    public function compose(View $view)
    {

        $menus = MenuItem::where('parent_id', '=', 0)
                            ->orderBy('order_by')

                            ->get();
        //dd($menus);
        $view->with('menus', $menus);
    }
}
