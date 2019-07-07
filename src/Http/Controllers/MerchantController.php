<?php
/**
 * Created by PhpStorm.
 * User: NAJMUL AHMED
 * Date: 4/2/2019
 * Time: 12:51 AM
 */

namespace najmulcse\laraplusadmin\Http\Controllers;

use najmulcse\laraplusadmin\Models\District;
use najmulcse\laraplusadmin\Models\Location;
use najmulcse\laraplusadmin\Models\LocationType;
use najmulcse\laraplusadmin\Models\MerchantType;
use najmulcse\laraplusadmin\Models\Merchant;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use najmulcse\laraplusadmin\Models\Permission;
use najmulcse\laraplusadmin\Models\Employee;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class MerchantController extends Controller
{
    protected $layoutFolder = "laraplusadmin::admin.merchants";
    public function __construct()
    {
        $permission = Route::currentRouteName();
        $this->middleware(['route_permission:'.$permission]);
    }

    public function index(Request $request)
    {

        $merchantType = MerchantType::all();
        $locationTypes = LocationType::all();
        $districts = District::all();

        return view("{$this->layoutFolder}.add-merchant", compact('merchantType','districts','locationTypes'));
    }
    public function allMerchants(Request $request)
    {
        $merchants  = Merchant::all();

        return view("{$this->layoutFolder}.all-merchants",compact('merchants'));
    }
    public function storeMerchant(Request $request)
    {
        $email = $request->email;
        $isInserted = true;
        if(Merchant::where('email', $email)->exists()){
            $isInserted = false;
        }
        if(Employee::where('email', $email)->exists()){
            $isInserted = false;
        }
        if($isInserted){
            $merchantArray = array(
                'mtype_id' => $request->mtype_id,
                'name' => $request->businessName,
                'website' => $request->website,
                'contact_person' => $request->contactPerson,
                'designation' => $request->designation,
                'mobile_no' => $request->mobileNo,
                'alternative_contact_no' => $request->alternativeContactNo,
                'email' => $email ,
                'logo' => isset($request->logo) ?: $request->logo,
                'referral_mobile_no' => $request->refMobileNo,
                'created_by' => Auth::id(),
            );
            $merchant = Merchant::create($merchantArray);

            $employee = array(
                'merchant_id'   => $merchant->id,
                'employee_id'   => mt_rand(10000000, 99999999),
                'name' => $request->businessName,
                'email' => $email,
                'mobile_no' => $request->mobileNo,
                'alternative_contact_no' => $request->alternativeContactNo,
                'password' => bcrypt('admin'),
            );
            $user  = Employee::create($employee);

            $location = array(
                'merchant_id' => $merchant->id,
                'location_type_id' => $request->locationType,
                'name' => $request->locationName,
                'phone_no' => $request->locationPhone,
                'district_id' => $request->locationDistrict,
                'thana_id' => $request->locationThana,
                'post_code' => $request->postalCode,
                'street_address' => $request->streetAddress,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'created_by' => Auth::id()
            );
            Location::create($location); //store location

            $adminRole = Role::where('name', 'Merchant')->first();
            $user->roles()->attach($adminRole);
            $user->permissions()->attach($adminRole->permissions);
            $message = "Successfully Added";
            $alertClass = "alert-success";
        }else{
            $message = "Already exists";
            $alertClass = "alert-danger";
        }
        Session::flash('message', $message);
        Session::flash('alertClass', $alertClass);
        return back();
    }

    public function delete(Request $request)
    {
        $status = "";
        $merchant = Merchant::find($request->id);
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
    public function edit(Request $request)
    {
        $merchantType = MerchantType::all();
        $locationTypes = LocationType::all();
        $merchant  = Merchant::findOrFail($request->id);
        $districts = District::all();
        return view("{$this->layoutFolder}.edit-merchant",
            compact('merchant','merchantType','locationTypes','districts'));
    }

    public function update(Request $request, $id)
    {
        $this->updateAndCreate($request, "update", $id);
        $message = "Updated Successfully";
        $alertClass = "alert-success";
        Session::flash('message', $message);
        Session::flash('alertClass', $alertClass);
        return back();
    }


    private function updateAndCreate($request, $type, $id)
    {
        $merchantArray = array(
            'mtype_id' => $request->mtype_id,
            'name' => $request->businessName,
            'website' => $request->website,
            'contact_person' => $request->contactPerson,
            'designation' => $request->designation,
            'mobile_no' => $request->mobileNo,
            'alternative_contact_no' => $request->alternativeContactNo,
            'logo' => isset($request->logo) ? $request->logo : NULL,
            'referral_mobile_no' => $request->refMobileNo,
            'created_by' => Auth::id(),
        );
        Merchant::findOrFail($id)
                     ->update($merchantArray);
        $employee = array(
            'merchant_id'   => $id,
            'name' => $request->businessName,
            'mobile_no' => $request->mobileNo,
            'alternative_contact_no' => $request->alternativeContactNo,
        );
        Employee::where('merchant_id',$id)
                    ->where('email', $request->email)
                    ->update($employee);

        $location = array(
            'merchant_id' => $id,
            'location_type_id' => $request->locationType,
            'name' => $request->locationName,
            'phone_no' => $request->locationPhone,
            'district_id' => $request->locationDistrict,
            'thana_id' => $request->locationThana,
            'post_code' => $request->postalCode,
            'street_address' => $request->streetAddress,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'created_by' => Auth::id()
        );
        $locationObj = Location::firstOrNew($location);
        $locationObj->save();



    }
}