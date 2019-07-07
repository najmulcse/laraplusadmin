<?php


namespace najmulcse\laraplusadmin\Http\Controllers;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UrlManageController extends Controller
{
    protected $layoutFolder = "laraplusadmin::admin.roles";

    public function __construct()
    {

        $permission = Route::currentRouteName();
        $this->middleware(['route_permission:'.$permission]);
    }

    public function showAllUrls(Request $request)
    {
        $urlGroups = Role::all();
        $urls = Permission::all();
        return view("{$this->layoutFolder}.show-urls",compact('urlGroups','urls'));
    }
    public function editUrl($id)
    {
        $urlGroups = Role::all();
        $url = Permission::find($id);
        return view("{$this->layoutFolder}.edit-url",compact('urlGroups','url'));
    }

    public function storeUrl(Request $request)
    {
        $url = trim($request->url);
        $name = ucfirst($request->name);
        $urlGroups = $request->urlGroup;
        $routeName = $request->routeName;
        if(Permission::where('url', $url)->where('name', $name)->exists()){
            $message = "Already Exists";
            $alertClass = "alert-danger";
        }else{
            $group = array(
                'name' => $name,
                'url' => $url,
                'route' => $routeName,
                'guard_name' => 'web',
                'created_by' => Auth::id()
            );
            $permission = Permission::create($group);
            $permission->syncRoles($urlGroups); // assign role
            $message = "added Successfully";
            $alertClass = "alert-success";
        }
        Session::flash('message', $message);
        Session::flash('alertClass', $alertClass);

        return back();
    }
    public function updateUrl(Request $request, $id)
    {
        $url = trim($request->url);
        $name = ucfirst($request->name);
        $urlGroup = $request->urlGroup;
        $routeName = $request->routeName;
            $permission = Permission::find($id);
            if($permission){
                $urlArray = array(
                    'name' => $name,
                    'url' => $url,
                    'route' => $routeName,
                    'guard_name' => 'web',
                    'updated_by' => Auth::id()
                );
                Permission::findOrFail($id)
                    ->update($urlArray);
                $permission->syncRoles($urlGroup);
                $message = "Updated successfully";
                $alertClass = "alert-success";
            }else{
                $message = "Not Exists";
                $alertClass = "alert-danger";
            }


        Session::flash('message', $message);
        Session::flash('alertClass', $alertClass);

        return back();
    }
    public function delete(Request $request)
    {
        $response = array();
        $responsibility = Permission::find($request->id);
        if($responsibility){
            $responsibility->delete();
            $message = "Deleted Successfully";
            $alertClass = "alert-success";
            $status = 'success';
        }else{
            $message = "Not Exists";
            $alertClass = "alert-danger";
            $status = 'error';
        }

        Session::flash('message', $message);
        Session::flash('alertClass', $alertClass);
        $response['status'] = $status;

        return response()->json(['status' => $status]);
    }
}