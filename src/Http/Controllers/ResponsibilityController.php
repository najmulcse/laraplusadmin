<?php


namespace najmulcse\laraplusadmin\Http\Controllers;


use App\Http\Controllers\Controller;
use najmulcse\laraplusadmin\Models\District;
use najmulcse\laraplusadmin\Models\LocationType;
use najmulcse\laraplusadmin\Models\Merchant;
use najmulcse\laraplusadmin\Models\MerchantType;
use najmulcse\laraplusadmin\Models\Responsibility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
//use Spatie\Permission\Models\Role;
use najmulcse\laraplusadmin\Models\Role;

class ResponsibilityController extends Controller
{
    protected $layoutFolder = "laraplusadmin::admin.roles";

    public function __construct()
    {

        $permission = Route::currentRouteName();
        $this->middleware(['route_permission:'.$permission]);
    }

    public function addResponsibility(Request $request)
    {
        $responsibilities = Responsibility::all();
        $roles = Role::all();
        $merchantTypes = MerchantType::all();

        return view("{$this->layoutFolder}.add-responsibility",compact('responsibilities','roles','merchantTypes'));
    }

    public function showResponsibilities(Request $request)
    {

        $responsibilities = Responsibility::all();
        return view("{$this->layoutFolder}.show-responsibilities",compact('responsibilities'));
    }

    public function storeResponsibility(Request $request)
    {
        $role = ucfirst($request->roleName);
        $urlGroups = $request->urlGroup;
        $merchantTypes = $request->merchantTypes;
        if(Responsibility::where('name', $role)->exists()){
            $message = "Already Exists";
            $alertClass = "alert-danger";
        }else{
            $responsibilityArray = array(
                'name' => $role,
                'created_by' => Auth::id()
            );
            $responsibility = Responsibility::create($responsibilityArray);
            $responsibility->roles()->attach($urlGroups);
            $user = Auth::user();
            if(!$user->hasAnyRole(Role::all())){
                Auth::user()->roles()->attach($urlGroups);
            }

            foreach ($merchantTypes as $type){
                $mType = MerchantType::findOrFail($type);
                $mType->responsibilities()->attach($responsibility);
            }


            $message = "added Successfully";

            $alertClass = "alert-success";
        }
        Session::flash('message', $message);
        Session::flash('alertClass', $alertClass);

        return back();

    }
    public function delete(Request $request)
    {
        $status = "";
        $responsibility = Responsibility::find($request->id);
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
    public function edit(Request $request, $id)
    {
        $responsibility = Responsibility::find($id);
        $roles = Role::all();
        $merchantTypes = MerchantType::all();
       // dd($merchantTypes);
        return view("{$this->layoutFolder}.edit-responsibility",
            compact('merchantTypes','roles','responsibility'));
    }
    public function update(Request $request, $id)
    {
        $role = ucfirst($request->roleName);
        $urlGroups = $request->urlGroup;
        $merchantTypes = $request->merchantTypes;

            $responsibilityArray = array(
                'name' => $role,
                'updated_by' => Auth::id()
            );
            $responsibility = Responsibility::where('id' , $id)->first();
            $responsibility->update($responsibilityArray);

            $responsibility->roles()->detach();
            $responsibility->roles()->attach($urlGroups);
            $user = Auth::user();
            if(!$user->hasAnyRole(Role::all())){
                Auth::user()->roles()->detach();
                Auth::user()->roles()->attach($urlGroups);
            }

            $responsibility->mTypes()->detach();
            $responsibility->mTypes()->attach($merchantTypes);
            $message = "Updated Successfully";

            $alertClass = "alert-success";

        Session::flash('message', $message);
        Session::flash('alertClass', $alertClass);

        return back();

    }
}