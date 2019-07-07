<?php
/**
 * Created by PhpStorm.
 * User: NAJMUL AHMED
 * Date: 4/6/2019
 * Time: 2:45 PM
 */

namespace najmulcse\laraplusadmin\Http\Controllers;


use App\Http\Controllers\Controller;
use najmulcse\laraplusadmin\Models\District;
use najmulcse\laraplusadmin\Models\Location;
use najmulcse\laraplusadmin\Models\LocationType;
use najmulcse\laraplusadmin\Models\Merchant;
use najmulcse\laraplusadmin\Models\MerchantType;
use najmulcse\laraplusadmin\Models\Responsibility;
use najmulcse\laraplusadmin\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class EmployeeController extends Controller
{
    private $merchantId;
    protected $layoutFolder = "laraplusadmin::admin.employee";
    public function __construct()
    {
        $permission = Route::currentRouteName();
        $this->middleware(['route_permission:'.$permission]);
    }

    public function allEmployees(Request $request)
    {
        $employees = Employee::where('merchant_id',Auth::user()->merchant_id )
                            ->where('active_status', true)
                            ->get();
        return view("{$this->layoutFolder}.all-employees",compact('employees'));
    }
    public function addEmployee(Request $request)
    {
        $merchantId = Auth::user()->merchant_id;
        $locations = Location::where('merchant_id', $merchantId)
                            ->get();
        $merchant = Merchant::find($merchantId);
        $mtype = MerchantType::findOrFail($merchant->mtype_id);

        $responsibilities = $mtype->responsibilities;

        return view("{$this->layoutFolder}.add-employee", compact('locations','responsibilities'));
    }

    public function storeEmployee(Request $request)
    {
        $email = $request->staffEmail;

        if(!Employee::where('email', $email)
                    ->orWhere('mobile_no',$request->staffPhone )->exists()){

            $imageName = NULL;
            if($request->hasFile('staffImage')){
                $file = $request->file('staffImage');
                $imageName = 'EM_'.$request->staffPhone.'_'. $file->getClientOriginalName();
                $filePath = public_path(). '/img/employees';

                $file->move($filePath, $imageName);
            }

            $employee = array(
                'merchant_id'   => Auth::user()->merchant_id ,
                'employee_id'   => $request->staffId,
                'name' => $request->staffName,
                'email' => $email,
                'gender' => $request->staffGender,
                'profile_photo' => $imageName,
                'mobile_no' => $request->staffPhone,
                'date_of_birth' => date("Y-m-d H:i:s", strtotime($request->staffDob)),
                'joining_date' => date('Y-m-d H:i:s',strtotime($request->staffJoinDate)),
                'salary' => $request->staffSalary,
                'designation' => $request->staffDes,
                'department' => $request->staffDept,
                'location_id' => $request->staffPosting,
                'emergency_contact_name' => $request->staffEmgContactName,
                'emergency_contact_relation' => $request->staffEmgContactRelation,
                'emergency_contact_no' => $request->staffEmgContactNo,
                'alternative_contact_no' => $request->alternativeContactNo,
                'password' => bcrypt('employee'),
            );
            $user  = Employee::create($employee);

//            $adminRole = Role::where('name', 'Merchant')->first();
//            $user->roles()->attach($adminRole);
//            $user->permissions()->attach($adminRole->permissions);
            // assign responsibility
            $responsibility = Responsibility::findOrFail($request->staffWebRole);
            $user->responsibilities()->attach($responsibility);

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
    public function edit(Request $request, $id)
    {
        $locations = Location::where('merchant_id',Auth::user()->merchant_id )
            ->get();
        $merchant = Merchant::findOrFail(Auth::user()->merchant_id);
        $mtype = MerchantType::findOrFail($merchant->mtype_id);

        $responsibilities = $mtype->responsibilities;
        $employee = Employee::findOrFail($id);

        return view("{$this->layoutFolder}.edit-employee",
            compact('employee','locations','responsibilities'));
    }

    public function update(Request $request, $id)
    {

        $email = $request->staffEmail;
        $employeePhoto = array();
        if($request->hasFile('staffImage')){
            $file = $request->file('staffImage');
            $imageName = 'EM_'.$request->staffPhone.'_'.  $file->getClientOriginalName();
            $filePath = public_path(). '/img/employees';
            $fileInFolder = $filePath.'/'.$imageName;
            if(file_exists($fileInFolder)){
               unlink($fileInFolder);
            }
            $file->move($filePath, $imageName);
            $employeePhoto = array(
                'profile_photo' =>$imageName
            );
        }

        $employee = array(
            'employee_id'   => $request->staffId,
            'name' => $request->staffName,
            'gender' => $request->staffGender,
            'mobile_no' => $request->staffPhone,
            'date_of_birth' => date("Y-m-d H:i:s", strtotime($request->staffDob)),
            'joining_date' => date('Y-m-d H:i:s',strtotime($request->staffJoinDate)),
            'salary' => $request->staffSalary,
            'designation' => $request->staffDes,
            'department' => $request->staffDept,
            'location_id' => $request->staffPosting,
            'emergency_contact_name' => $request->staffEmgContactName,
            'emergency_contact_relation' => $request->staffEmgContactRelation,
            'emergency_contact_no' => $request->staffEmgContactNo,
            'alternative_contact_no' => $request->alternativeContactNo,
            'active_status' => $request->staffEmploymentStatus,
        );

        $user = Employee::findOrFail($id);
        $user->update(array_merge($employee, $employeePhoto));
        // assign responsibility
        $responsibility = Responsibility::findOrFail($request->staffWebRole);
        $user->responsibilities()->detach();
        $user->responsibilities()->attach($responsibility);

        $message = "Successfully updated";
        $alertClass = "alert-success";
        Session::flash('message', $message);
        Session::flash('alertClass', $alertClass);
        return back();
    }
    public function delete(Request $request)
    {
        $status = "";
        $employee = Employee::find($request->id);
        if($employee){
            $employee->delete();
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