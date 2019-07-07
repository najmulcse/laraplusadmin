<?php


namespace najmulcse\laraplusadmin\Http\Controllers;


use App\Http\Controllers\Controller;
use najmulcse\laraplusadmin\Models\District;
use najmulcse\laraplusadmin\Models\LocationType;
use najmulcse\laraplusadmin\Models\Permission;
use najmulcse\laraplusadmin\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class PasswordChangeController extends Controller
{
    protected $layoutFolder = "laraplusadmin::admin.accounts.password";

    public function __construct()
    {
        $permission = Route::currentRouteName();
        $this->middleware(['route_permission:'.$permission]);
    }
    public function changePasswordFormShow()
    {

        return view("{$this->layoutFolder}.password-change-form");
    }
    public function updatePassword(Request $request)
    {
        $msg = "";
        $status = true;
        $dbOldPassord = Auth::user()->password;

        $requestOldPassword = $request->oldPassword;
        $requestNewPassword = $request->newPassword;
        $requestConfirmPassword = $request->confirmPassword;

        if(!$this->passwordCorrect($requestOldPassword)){

            $msg = "Old password not matched. Please provide correct old password";
            $status = false;
        }else if($requestNewPassword != $requestConfirmPassword){
            $msg = "New password and confirm password mismatch";
            $status = false;

        }
        if($status){
            Employee::find(Auth::id())->update(['password' => bcrypt($requestNewPassword)]);
            $msg = "Password updated successfully.";
            $alertClass = "alert-success";
        }else{
            $alertClass = "alert-danger";
        }
        Session::flash('message', $msg);
        Session::flash('alertClass', $alertClass);

        return back();
    }
    private function passwordCorrect($suppliedPassword)
        {
            return Hash::check($suppliedPassword, Auth::user()->password, []);
         }

}