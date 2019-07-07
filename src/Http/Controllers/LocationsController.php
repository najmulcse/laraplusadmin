<?php


namespace najmulcse\laraplusadmin\Http\Controllers;


use App\Http\Controllers\Controller;
use najmulcse\laraplusadmin\Models\District;
use najmulcse\laraplusadmin\Models\Location;
use najmulcse\laraplusadmin\Models\LocationType;
use najmulcse\laraplusadmin\Models\Merchant;
use najmulcse\laraplusadmin\Models\MerchantType;
use najmulcse\laraplusadmin\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class LocationsController extends Controller
{
    protected $layoutFolder = "laraplusadmin::admin.locations";

    public function __construct()
    {
        $permission = Route::currentRouteName();
        $this->middleware(['route_permission:'.$permission]);
    }
    public function addLocation()
    {

        $locationTypes = LocationType::all();
        $districts = District::all();

        return view("{$this->layoutFolder}.add-location", compact('districts','locationTypes'));
    }
    public function allLocations()
    {

        $locations = Location::where('merchant_id', Auth::user()->merchant_id)->get();
        return view("{$this->layoutFolder}.all-locations", compact('locations'));
    }
    public function storeLocation(Request $request)
    {

        $merchantId = Auth::user()->merchant_id;
        if(!Location::where('merchant_id', $merchantId)
            ->where('location_type_id', $request->locationType)
            ->exists()){

            $location = array(
                'merchant_id' => $merchantId,
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
            $message = "Saved Successfully";
            $alertClass = "alert-success";
        }else{
            $message = "Already exists";
            $alertClass = "alert-danger";
        }

        Session::flash('message', $message);
        Session::flash('alertClass', $alertClass);
        return back();
    }
    public function edit(Request $request)
    {
        $locationTypes = LocationType::all();
        $location  = Location::findOrFail($request->id);
        $districts = District::all();
        return view("{$this->layoutFolder}.edit-location",
            compact('location','merchantType','locationTypes','districts'));
    }

    public function update(Request $request, $id)
    {
        if(Location::where('merchant_id', Auth::user()->merchant_id)
            ->where('location_type_id', $request->locationType)
            ->exists()) {
            $message = "Already exists";
            $alertClass = "alert-danger";
        }else{
            $location = array(
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
            $locationObj = Location::find($id)->update($location);
            $message = "Updated Successfully";
            $alertClass = "alert-success";
        }

        Session::flash('message', $message);
        Session::flash('alertClass', $alertClass);
        return back();
    }
    public function delete(Request $request)
    {
        $status = "";
        $merchant = Location::find($request->id);
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