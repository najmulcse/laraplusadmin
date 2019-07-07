<?php


namespace najmulcse\laraplusadmin\Http\Controllers;


use App\Http\Controllers\Controller;
use najmulcse\laraplusadmin\Models\Merchant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class ProfileController extends Controller
{
    protected $layoutFolder = "laraplusadmin::admin.accounts.profile";

    public function __construct()
    {
        $permission = Route::currentRouteName();
        $this->middleware(['route_permission:'.$permission]);
    }
    public function businessProfile()
    {
        $merchant = Merchant::find(Auth::user()->merchant_id);
        return view("{$this->layoutFolder}.business-profile",compact('merchant'));
    }
    public function myProfile()
    {
        $employee = Auth::user();
        return view("{$this->layoutFolder}.my-profile",compact('employee'));
    }


}