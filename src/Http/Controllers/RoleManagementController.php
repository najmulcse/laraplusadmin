<?php
/**
 * Created by PhpStorm.
 * User: NAJMUL AHMED
 * Date: 4/5/2019
 * Time: 10:59 PM
 */

namespace najmulcse\laraplusadmin\Http\Controllers;

use App\Http\Controllers\Controller;
use najmulcse\laraplusadmin\Models\Responsibility;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use najmulcse\laraplusadmin\Models\MerchantType;
use najmulcse\laraplusadmin\Models\Role;
use Illuminate\Http\Request;

class RoleManagementController extends Controller
{
    protected $layoutFolder = "laraplusadmin::admin.roles";

    /**
     * RoleManagementController constructor.
     */
    public function __construct()
    {

        $permission = Route::currentRouteName();
        $this->middleware(['route_permission:'.$permission]);
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUrlGroupAddingForm()
    {
        $roles = MerchantType::all();
        return view("{$this->layoutFolder}.add-role",compact('roles'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeRole(Request $request)
    {
        $urlGroupName = ucfirst($request->name);
      if(Role::where('name', $urlGroupName)->exists()){
          $message = "Already Exists";
          $alertClass = "alert-danger";
      }else{
          $urlGroup = array(
              'name' => $urlGroupName,
              'guard_name' => 'web',
              'created_by' => Auth::id()
          );
          Role::create($urlGroup);
          $message = "added Successfully";

          $alertClass = "alert-success";
      }
        Session::flash('message', $message);
        Session::flash('alertClass', $alertClass);

        return back();
    }

    /**
     * @param Request $request
     */
    public function showAllUrlGroup(Request $request)
    {
        $roles = Role::all();
        return view("{$this->layoutFolder}.show-url-groups",compact('roles'));
    }

    public function delete(Request $request)
    {
        $status = "";
        $role = Role::find($request->id);
        if($role){
            if($role->name == 'Role'){
                $message = "Admin Role can not delete";
                $alertClass = "alert-danger";
                $status = "error";
            }else{
                $role->delete();
                $message = "Deleted Successfully";
                $alertClass = "alert-success";
                $status = "success";
            }
        }else{
            $message = "Not Exists";
            $alertClass = "alert-danger";
        }

        Session::flash('message', $message);
        Session::flash('alertClass', $alertClass);
        $response['status'] = $status;

        return response()->json(['status' => $status]);
    }
    public function edit($id)
    {

    }

    public function update(Request $request){

        Role::find($request->id)->update(['name' => $request->name,'updated_by' => Auth::id()]);
        return response()->json(['status' => 'Suceess']);
    }

}