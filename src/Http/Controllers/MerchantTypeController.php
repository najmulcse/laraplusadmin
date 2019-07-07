<?php
/**
 * Created by PhpStorm.
 * User: NAJMUL AHMED
 * Date: 6/15/2019
 * Time: 6:32 PM
 */

namespace najmulcse\laraplusadmin\Http\Controllers;


use najmulcse\laraplusadmin\Models\Responsibility;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use najmulcse\laraplusadmin\Models\MerchantType;
use najmulcse\laraplusadmin\Models\Role;
use Illuminate\Http\Request;

class MerchantTypeController extends Controller
{
    protected $layoutFolder = "laraplusadmin::admin.merchantTypes";
    /**
     * RoleManagementController constructor.
     */
    public function __construct()
    {

        $permission = Route::currentRouteName();
        $this->middleware(['route_permission:'.$permission]);
    }

    public function index()
    {
        $merchantTypes = MerchantType::all();
        return view("{$this->layoutFolder}.add-merchant-type",compact('merchantTypes'));
    }
    public function store(Request $request)
    {
        $merchantTypeTitle = ucfirst($request->title);
        if(MerchantType::where('title', $merchantTypeTitle)->exists()){
            $message = "Already Exists";
            $alertClass = "alert-danger";
        }else{
            $type = array(
                'title' => $merchantTypeTitle,
                'created_by' => Auth::id()
            );
            MerchantType::create($type);
            $message = "Added successfully";

            $alertClass = "alert-success";
        }
        Session::flash('message', $message);
        Session::flash('alertClass', $alertClass);

        return back();

    }
    public function update(Request $request)
    {
        MerchantType::find($request->id)->update(['title' => $request->title, 'updated_by'=> Auth::id()]);

        return response()->json(['status' => 'Suceess']);
    }
    public function delete(Request $request)
    {
        $status = "";
        $merchant = MerchantType::find($request->id);
        if($merchant){
            $merchant->delete();
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
}