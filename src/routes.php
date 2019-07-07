<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(Auth::check()){
        return redirect()->route('admin.index');
    }
    return redirect()->route('login');
});

Route::group(['namespace' => 'App\Http\Controllers\Auth','middleware' => 'web'], function () {
    // Authentication Routes...
// Authentication (login/signup)

//    // Registration Routes...
//    Route::get('register', 'RegisterController@showRegistrationForm')->middleware(['guest'])->name('register');
//    Route::post('register', 'RegisterController@register');


    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('logout');
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');

//    //Account Activate
    Route::get('reset/password/email', 'AccountActivateController@passwordResetByEmail')->name('reset.password.email');
    Route::post('reset/password/email', 'AccountActivateController@passwordReset')->name('reset.password.email');

//Auth::routes();
});

Route::group([ 'prefix'=> 'admin','namespace' => 'najmulcse\laraplusadmin\Http\Controllers', 'middleware' => 'web'], function () {

    // admin

    Route::get('/', 'HomeController@index')->name('admin.index');
    //merchants
    Route::get('/add-merchant', 'MerchantController@index')->name('admin.add.merchant');
    Route::get('/all-merchants', 'MerchantController@allMerchants')->name('admin.all.merchants');
    Route::post('/store-merchant', 'MerchantController@storeMerchant')->name('admin.store.merchant');
    Route::post('/delete-merchant', 'MerchantController@delete')->name('admin.delete.merchant');
    Route::get('/edit-merchant/{id}', 'MerchantController@edit')->name('admin.edit.merchant');
    Route::post('/update-merchant/{id}', 'MerchantController@update')->name('admin.update.merchant');
    //merchants Type
    Route::get('/add-merchant-type', 'MerchantTypeController@index')->name('admin.add.merchant.type');
    //Route::get('/view-merchants-type', 'MerchantTypeController@allMerchants')->name('admin.all.merchants');
    Route::post('/store-merchant-type', 'MerchantTypeController@store')->name('admin.store.merchant.type');
    Route::post('/delete-merchant-type', 'MerchantTypeController@delete')->name('admin.delete.merchant.type');
//    Route::get('/edit-merchant/{id}', 'MerchantTypeController@edit')->name('admin.edit.merchant.type');
    Route::post('/update-merchant-type', 'MerchantTypeController@update')->name('admin.update.merchant.type');

    //employees
    Route::get('/all-employees', 'EmployeeController@allEmployees')->name('admin.all.employees');
    Route::get('/add-employee', 'EmployeeController@addEmployee')->name('admin.add.employee');
    Route::post('/store-employee', 'EmployeeController@storeEmployee')->name('admin.store.employee');
    Route::post('/delete-employee', 'EmployeeController@delete')->name('admin.delete.employee');
    Route::get('/edit-employee/{id}', 'EmployeeController@edit')->name('admin.edit.employee');
    Route::post('/update-employee/{id}', 'EmployeeController@update')->name('admin.update.employee');

    //url groups
    Route::get('/add-url-group', 'RoleManagementController@showUrlGroupAddingForm')->name('admin.add.url_group');
    Route::post('/store-url-group', 'RoleManagementController@storeUrlGroup')->name('admin.store.url_group');
    Route::get('/view-url-groups', 'RoleManagementController@showAllUrlGroup')->name('admin.view.url_groups');
    Route::post('/delete-url-group', 'RoleManagementController@delete')->name('admin.delete.url_group');
    Route::get('/edit-url-group', 'RoleManagementController@edit')->name('admin.edit.url_group');
    Route::post('/update-url-group', 'RoleManagementController@update')->name('admin.update.url_group');

    // urls
    Route::get('/view-all-urls', 'UrlManageController@showAllUrls')->name('admin.view.all.urls');
    Route::post('/store-url', 'UrlManageController@storeUrl')->name('admin.store.url');
    Route::get('/edit-url/{id}', 'UrlManageController@editUrl')->name('admin.edit.url');
    Route::post('/update-url/{id}', 'UrlManageController@updateUrl')->name('admin.update.url');
    Route::post('/delete-url', 'UrlManageController@delete')->name('admin.delete.url');


    // responsibility
    Route::get('/add-role', 'ResponsibilityController@addResponsibility')->name('admin.add.role');
    Route::get('/view-roles', 'ResponsibilityController@showResponsibilities')->name('admin.view.roles');
    Route::post('/store-role', 'ResponsibilityController@storeResponsibility')->name('admin.store.role');
    Route::post('/delete-role', 'ResponsibilityController@delete')->name('admin.delete.role');
    Route::get('/edit-role/{id}', 'ResponsibilityController@edit')->name('admin.edit.role');
    Route::post('/update-role/{id}', 'ResponsibilityController@update')->name('admin.update.role');

    // location
    Route::get('/districts', 'LocationController@getDistrict')->name('admin.district');

    // admin location
    Route::get('/add-location', 'LocationsController@addLocation')->name('admin.add.location');
    Route::get('/all-locations', 'LocationsController@allLocations')->name('admin.all.locations');
    Route::post('/store-location', 'LocationsController@storeLocation')->name('admin.store.location');
    Route::post('/delete-location', 'LocationsController@delete')->name('admin.delete.location');
    Route::get('/edit-location/{id}', 'LocationsController@edit')->name('admin.edit.location');
    Route::post('/update-location/{id}', 'LocationsController@update')->name('admin.update.location');



// location - district thana

    Route::get('store-districts', 'LocationController@storeDistrict')->name('admin.store.districts');
    Route::get('store-thanas', 'LocationController@storeThana')->name('admin.store.thana');
    Route::post('get-thana-by-district', 'LocationController@getThanaByDistrictId')->name('admin.all.thana.by_district');

    //location type
    Route::get('/add-location-type', 'LocationTypeController@addLocationType')->name('admin.add.location.type');
    Route::post('/store-location-type', 'LocationTypeController@store')->name('admin.store.location.type');
    Route::post('/delete-location-type', 'LocationTypeController@delete')->name('admin.delete.location.type');


    // accounts
    Route::get('/my-profile', 'ProfileCOntroller@myProfile')->name('admin.my.profile');
    Route::get('/business-profile', 'ProfileController@businessProfile')->name('admin.business.profile');
    Route::get('/change-password', 'PasswordChangeController@changePasswordFormShow')->name('admin.password.change.showForm');
    Route::post('/update-password', 'PasswordChangeController@updatePassword')->name('admin.password.update');

    //menus
    Route::get('/add-menu', 'MenuController@addMenu')->name('admin.add.menu');
    Route::post('/store-menu', 'MenuController@storeMenu')->name('admin.store.menu');
    Route::post('/delete-menu', 'MenuController@delete')->name('admin.delete.menu');
    Route::get('/edit-menu/{id}', 'MenuController@edit')->name('admin.edit.menu');
    Route::post('/update-menu', 'MenuController@update')->name('admin.update.menu');

    Route::get('/order-menu', 'MenuController@getIndex')->name('admin.order.menu');
    Route::post('/store-order-menu', 'MenuController@menuItemReOrdering')->name('admin.store.order.menu');

    // menu items
    Route::post('/store-menu-item', 'menuController@storeMenuItem')->name('admin.store.menu.item');
    Route::post('menu-item-delete', 'MenuController@menuItemDelete')->name('admin.menu.item.delete');

    Route::post('menu-item-update', 'MenuController@menuItemUpdate')->name('admin.menu.item.update');

    // testing
    Route::get('/add-role-permission', 'BaseController@storeRoleAndPermission')->name('store.role.permission');

});


// admin related routes started....
//Route::prefix('admin')->group(['namespace' => 'najmulcse\laraplusadmin'], function () {
//
//});
// admin related routes ended....




// testing

//Route::get('/test-modals', function (){
//    return view('admin.layouts.modals.ui-elements-modals');
//})->name('test.modals');

