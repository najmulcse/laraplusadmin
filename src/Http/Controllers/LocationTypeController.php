<?php


namespace najmulcse\laraplusadmin\Http\Controllers;


use App\Http\Controllers\Controller;
use najmulcse\laraplusadmin\Models\LocationType;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class LocationTypeController extends Controller
{
    protected $layoutFolder = "laraplusadmin::admin.locations";
    public function __construct()
    {
        $permission = Route::currentRouteName();
        $this->middleware(['route_permission:'.$permission]);
    }
    public function addLocationType()
    {
        $locationTypes = LocationType::all();
        return view("{$this->layoutFolder}.add-location-type", compact('locationTypes'));
    }

    public function store(Request $request)
    {
        $locationTypeName = $request->locationTypeName;
        if(LocationType::where('type_name', $locationTypeName)->exists()){
            $message = "Already Exists";
            $alertClass = "alert-danger";
        }else{
            $locationType = array(
                'type_name' => $locationTypeName,
                'created_by' => Auth::id()
            );
            LocationType::create($locationType);

            $message = "Added Successfully";

            $alertClass = "alert-success";
        }
        Session::flash('message', $message);
        Session::flash('alertClass', $alertClass);

        return back();

    }
    public function delete(Request $request)
    {
        $status = "";
        $responsibility = LocationType::find($request->id);
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

}