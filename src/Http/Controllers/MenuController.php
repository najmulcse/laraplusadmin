<?php


namespace najmulcse\laraplusadmin\Http\Controllers;


use App\Http\Controllers\Controller;
use najmulcse\laraplusadmin\Models\Location;
use najmulcse\laraplusadmin\Models\Menu;
use najmulcse\laraplusadmin\Models\MenuItem;
use najmulcse\laraplusadmin\Models\Permission;
use najmulcse\laraplusadmin\Models\Responsibility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    protected $layoutFolder = "laraplusadmin::admin.menus";
    public function __construct()
    {
        $permission = Route::currentRouteName();
      //  $this->middleware(['route_permission:'.$permission]);
    }

    public function addMenu(Request $request)
    {
        $menuList = Menu::all();
        $menuItems = MenuItem::all();
        $urls = Permission::all();

        return view("{$this->layoutFolder}.add-menu",
            compact('menuList','menuItems','urls'));
    }
    public function storeMenu(Request $request)
    {
        $name = ucfirst($request->name);
        if(Menu::where('title', $name)->exists()){
            $message = "Already Exists";
            $alertClass = "alert-danger";
        }else{
            $menuArray = array(
                'title' => $name,
                'created_by'=> Auth::id()
            );
            $responsibility = Menu::create($menuArray);
            $message = "Added successfully";

            $alertClass = "alert-success";
        }
        Session::flash('message', $message);
        Session::flash('menu', true);
        Session::flash('alertClass', $alertClass);

        return back();
    }
    public function storeMenuItem(Request $request)
    {
        $menuItemTitle= ucfirst($request->menuItemTitle);
        $menuId = $request->menu;
        $parentId = $request->parent;
        $url = $request->url;
        $menuIcon = $request->menuIcon;
        if(MenuItem::where('title', $menuItemTitle)
            ->where('menu_id', $menuId)->exists()){
            $message = "Already Exists";
            $alertClass = "alert-danger";
        }else{
            $menuItemArray = array(
                'title' => $menuItemTitle,
                'menu_id' => $menuId,
                'parent_id' => isset($parentId)? $parentId: 0,
                'icon_class' => $menuIcon,
                'permission_id' => $url,
                'order_by' => MenuItem::where('parent_id', $parentId)->max('order_by')+1,
                'created_by' => Auth::id()
            );
            MenuItem::create($menuItemArray);
            $message = "Added successfully";

            $alertClass = "alert-success";
        }
        Session::flash('message', $message);
        Session::flash('menu_item', true);
        Session::flash('alertClass', $alertClass);

        return back();
    }
    public function delete(Request $request)
    {
        $status = "";
        $responsibility = Menu::find($request->id);
        if($responsibility){
            $responsibility->delete();
            $message = "Deleted Successfully";
            $alertClass = "alert-success";
            $status = "success";

        }else{
            $message = "Not Exists";
            $alertClass = "alert-danger";
        }

        Session::flash('message', $message);
        Session::flash('alertClass', $alertClass);
        $response['status'] = $status;

        return response()->json(['status' => $status]);
    }


    // nested menu items


    public function getIndex(Request $request)
    {
        $menuId = $request->id ? $request->id : 1;
        $items 	= MenuItem::orderBy('order_by')
            ->where('menu_id', $menuId)->get();
        // dd($items);
        $menu 	= new MenuItem();
        $menu   = $menu->getHTML($items);
        $urls = Permission::all();
        $menuNames = Menu::all();
        $selectedMeu = Menu::find($menuId);
        // dd($menu);
        return view("{$this->layoutFolder}.builder",
            array('items'=>$items,'menu'=>$menu, 'urls'=> $urls, 'menuNames' => $menuNames
            ,'selectedMenu' => $selectedMeu));
    }

    public function menuItemUpdate(Request $request)
    {
        $permissionId = $request->permission_id;
        $itemId = $request->item_id;
        $item = MenuItem::find($itemId);

        $item->title = $request->title;
        $item->icon_class = $request->icon_class;
        $item->permission_id = $permissionId;

        $item->save();

        return response()->json(['status' => "success"]);
    }

    // AJAX Reordering function
    public function menuItemReOrdering(Request $request)
    {

        $source       = e(Input::get('source'));
        $destination  = e(Input::get('destination',0));

        $item             = MenuItem::find($source);
        $item->parent_id  = $destination;
        $item->save();

        $ordering       = json_decode(Input::get('order'));
        $rootOrdering   = json_decode(Input::get('rootOrder'));

        if($ordering){
            foreach($ordering as $order=>$item_id){
                if($itemToOrder = MenuItem::find($item_id)){
                    $itemToOrder->order_by = $order;
                    $itemToOrder->save();
                }
            }
        } else {
            foreach($rootOrdering as $order=>$item_id){
                if($itemToOrder = MenuItem::find($item_id)){
                    $itemToOrder->order_by = $order;
                    $itemToOrder->save();
                }
            }
        }

        return 'ok ';
    }

    public function menuItemDelete(Request $request)
    {
        $status = "sucess";
        $id = $request->delete_id;
        // Find all items with the parent_id of this one and reset the parent_id to zero
        MenuItem::where('parent_id', $id)->get()->each(function($item)
        {
            $item->parent_id = 0;
            $item->save();
        });

        // Find and delete the item that the user requested to be deleted
        $item = MenuItem::find($id);
        $item->delete();
        $response['status'] = $status;
        return response()->json(['status' => $status]);
    }
    public function getMenuItemDetails(Request $request)
    {
        $status = "sucess";
        $id = $request->delete_id;
        // Find all items with the parent_id of this one and reset the parent_id to zero
        MenuItem::where('parent_id', $id)->get()->each(function($item)
        {
            $item->parent_id = 0;
            $item->save();
        });

        // Find and delete the item that the user requested to be deleted
        $item = MenuItem::find($id);
        $item->delete();
        $response['status'] = $status;
        return response()->json(['status' => $status]);
    }

}