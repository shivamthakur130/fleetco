<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //return view('welcome');
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/profile', [App\Http\Controllers\HomeController::class, 'adminProfile'])->name('admin.profile');
Route::post('/admin/profile/update', [App\Http\Controllers\HomeController::class, 'adminProfileUpdate'])->name('admin.profile-update');
Route::get('/admin-area', [App\Http\Controllers\HomeController::class, 'adminArea'])->name('admin-area');
Route::get('/admin-area/user-add', [App\Http\Controllers\UserController::class, 'addUser'])->name('admin-area.user-add');
Route::post('/admin-area/user-save', [App\Http\Controllers\UserController::class, 'saveUser'])->name('admin-area.user-save');
Route::get('/admin-area/user-edit/{id}', [App\Http\Controllers\UserController::class, 'editUser'])->name('admin-area.user-edit');
Route::post('/admin-area/user-update', [App\Http\Controllers\UserController::class, 'updateUser'])->name('admin-area.user-update');
Route::get('/admin-area/user-delete/{id}', [App\Http\Controllers\UserController::class, 'deleteUser'])->name('admin-area.user-delete');

//admin area group
Route::get('/admin-area/group', [App\Http\Controllers\GroupController::class, 'index'])->name('admin-area.group');
Route::get('/admin-area/group-add', [App\Http\Controllers\GroupController::class, 'addGroup'])->name('admin-area.group-add');
Route::post('/admin-area/group-save', [App\Http\Controllers\GroupController::class, 'saveGroup'])->name('admin-area.group-save');
Route::get('/admin-area/group-delete/{id}', [App\Http\Controllers\GroupController::class, 'deleteGroup'])->name('admin-area.group-delete');
Route::get('/admin-area/group-edit/{id}', [App\Http\Controllers\GroupController::class, 'editGroup'])->name('admin-area.group-edit');
Route::post('/admin-area/group-update', [App\Http\Controllers\GroupController::class, 'updateGroup'])->name('admin-area.group-update');

//admin area permission
Route::get('/admin-area/permission', [App\Http\Controllers\PermissionController::class, 'index'])->name('admin-area.permission');
Route::post('/admin-area/permission/change', [App\Http\Controllers\PermissionController::class, 'changePermission']);


//admin master-data->fleet
Route::get('/admin/master-data/fleet', [App\Http\Controllers\FleetController::class, 'index'])->name('admin.fleet');
Route::get('/admin/master-data/fleet/create', [App\Http\Controllers\FleetController::class, 'create'])->name('admin.fleet.create');
Route::post('/admin', [App\Http\Controllers\FleetController::class, 'store'])->name('admin.fleet.save');
Route::get('/admin/edit/{id}', [App\Http\Controllers\FleetController::class, 'edit'])->name('admin.fleet.edit');
Route::post('/admin/fleet/update', [App\Http\Controllers\FleetController::class, 'update'])->name('admin.fleet.update');
Route::get('/admin/delete/{id}', [App\Http\Controllers\FleetController::class, 'destroy'])->name('admin.fleet.delete');

//admin master-data->fleet
Route::get('/admin/master-data/suppliers', [App\Http\Controllers\SupplierController::class, 'index'])->name('admin.suppliers');
Route::get('/admin/master-data/supplier/create', [App\Http\Controllers\SupplierController::class, 'create'])->name('admin.supplier.create');
Route::post('/admin/master-data/supplier/save', [App\Http\Controllers\SupplierController::class, 'store'])->name('admin.supplier.save');
Route::get('/admin/supplier/edit/{id}', [App\Http\Controllers\SupplierController::class, 'edit'])->name('admin.supplier.edit');
Route::get('/admin/supplier/delete/{id}', [App\Http\Controllers\SupplierController::class, 'destroy'])->name('admin.supplier.delete');
Route::post('/admin/supplier/update', [App\Http\Controllers\SupplierController::class, 'update'])->name('admin.supplier.update');


//admin master-data->fleet
Route::get('/admin/master-data/fleet-types', [App\Http\Controllers\FleetTypeController::class, 'index'])->name('admin.fleet-type');
Route::get('/admin/master-data/fleet-type/create', [App\Http\Controllers\FleetTypeController::class, 'create'])->name('admin.fleet-type.create');
Route::post('/admin/master-data/fleet-type/save', [App\Http\Controllers\FleetTypeController::class, 'store'])->name('admin.fleet-type.save');
Route::get('/admin/fleet-type/delete/{id}', [App\Http\Controllers\FleetTypeController::class, 'destroy'])->name('admin.fleet-type.delete');
Route::get('/admin/fleet-type/edit/{id}', [App\Http\Controllers\FleetTypeController::class, 'edit'])->name('admin.fleet-type.edit');
Route::post('/admin/fleet-type/update', [App\Http\Controllers\FleetTypeController::class, 'update'])->name('admin.fleet-type.update');

//admin master-data->stock code
Route::get('/admin/stock-codes', [App\Http\Controllers\StockCodeController::class, 'index'])->name('admin.stock-code');
Route::get('/admin/stock-code/create', [App\Http\Controllers\StockCodeController::class, 'create'])->name('admin.stock-code.create');
Route::post('/admin/stock-code/save', [App\Http\Controllers\StockCodeController::class, 'store'])->name('admin.stock-code.save');
Route::get('/admin/stock-code/edit/{id}', [App\Http\Controllers\StockCodeController::class, 'edit'])->name('admin.stock-code.edit');
Route::post('/admin/stock-code/update', [App\Http\Controllers\StockCodeController::class, 'update'])->name('admin.stock-code.update');
Route::get('/admin/stock-code/delete/{id}', [App\Http\Controllers\StockCodeController::class, 'destroy'])->name('admin.stock-code.delete');

//admin master-data->vehicle type
Route::get('/admin/vehicle-type', [App\Http\Controllers\VehicleTypeController::class, 'index'])->name('admin.vehicle_type');
Route::get('/admin/vehicle-type/create', [App\Http\Controllers\VehicleTypeController::class, 'create'])->name('admin.vehicle-type.create');
Route::post('/admin/vehicle-type/save', [App\Http\Controllers\VehicleTypeController::class, 'store'])->name('admin.vehicle-type.save');
Route::get('/admin/vehicle-type/delete/{id}', [App\Http\Controllers\VehicleTypeController::class, 'destroy'])->name('admin.vehicle-type.delete');
Route::get('/admin/vehicle-type/edit/{id}', [App\Http\Controllers\VehicleTypeController::class, 'edit'])->name('admin.vehicle-type.edit');
Route::post('/admin/vehicle-type/update', [App\Http\Controllers\VehicleTypeController::class, 'update'])->name('admin.vehicle-type.update');

//admin master-data->service type
Route::get('/admin/service-type', [App\Http\Controllers\ServiceTypeController::class, 'index'])->name('admin.service_type');
Route::get('/admin/service-type/create', [App\Http\Controllers\ServiceTypeController::class, 'create'])->name('admin.service-type.create');
Route::post('/admin/service-type/save', [App\Http\Controllers\ServiceTypeController::class, 'store'])->name('admin.service-type.save');
Route::get('/admin/service-type/delete/{id}', [App\Http\Controllers\ServiceTypeController::class, 'destroy'])->name('admin.service-type.delete');
Route::get('/admin/service-type/edit/{id}', [App\Http\Controllers\ServiceTypeController::class, 'edit'])->name('admin.service-type.edit');
Route::post('/admin/service-type/update', [App\Http\Controllers\ServiceTypeController::class, 'update'])->name('admin.service-type.update');

//admin master-data-> renewal
Route::get('/admin/renewals', [App\Http\Controllers\RenewalController::class, 'index'])->name('admin.renewals');
Route::get('/admin/renewals/create', [App\Http\Controllers\RenewalController::class, 'create'])->name('admin.renewal.create');
Route::post('/admin/renewals/save', [App\Http\Controllers\RenewalController::class, 'store'])->name('admin.renewal.save');
Route::get('/admin/renewals/delete/{id}', [App\Http\Controllers\RenewalController::class, 'destroy'])->name('admin.renewal.delete');
Route::get('/admin/renewals/edit/{id}', [App\Http\Controllers\RenewalController::class, 'edit'])->name('admin.renewal.edit');
Route::post('/admin/renewals/update', [App\Http\Controllers\RenewalController::class, 'update'])->name('admin.renewal.update');

//admin master-data->Insurance
Route::get('/admin/insurances', [App\Http\Controllers\InsuranceCompanyController::class, 'index'])->name('admin.insurance');
Route::get('/admin/insurance/create', [App\Http\Controllers\InsuranceCompanyController::class, 'create'])->name('admin.insurance.create');
Route::post('/admin/insurance/save', [App\Http\Controllers\InsuranceCompanyController::class, 'store'])->name('admin.insurance.save');
Route::get('/admin/insurance/delete/{id}', [App\Http\Controllers\InsuranceCompanyController::class, 'destroy'])->name('admin.insurance.delete');
Route::get('/admin/insurance/edit/{id}', [App\Http\Controllers\InsuranceCompanyController::class, 'edit'])->name('admin.insurance.edit');
Route::post('/admin/insurance/update', [App\Http\Controllers\InsuranceCompanyController::class, 'update'])->name('admin.insurance.update');

//admin ->companies
Route::get('/admin/companies', [App\Http\Controllers\CompanyController::class, 'index'])->name('admin.company');
Route::get('/admin/company/create', [App\Http\Controllers\CompanyController::class, 'create'])->name('admin.company.create');
Route::post('/admin/company/save', [App\Http\Controllers\CompanyController::class, 'store'])->name('admin.company.save');
Route::get('/admin/company/edit/{id}', [App\Http\Controllers\CompanyController::class, 'edit'])->name('admin.company.edit');
Route::get('/admin/company/delete/{id}', [App\Http\Controllers\CompanyController::class, 'destroy'])->name('admin.company.delete');
Route::post('/admin/company/update', [App\Http\Controllers\CompanyController::class, 'update'])->name('admin.company.update');

//admin ->branch
Route::get('/admin/branches', [App\Http\Controllers\BranchController::class, 'index'])->name('admin.branch');
Route::get('/admin/branch/create', [App\Http\Controllers\BranchController::class, 'create'])->name('admin.branch.create');
Route::post('/admin/branch/save', [App\Http\Controllers\BranchController::class, 'store'])->name('admin.branch.save');
Route::get('/admin/branch/edit/{id}', [App\Http\Controllers\BranchController::class, 'edit'])->name('admin.branch.edit');
Route::get('/admin/branch/delete/{id}', [App\Http\Controllers\BranchController::class, 'destroy'])->name('admin.branch.delete');
Route::post('/admin/branch/update', [App\Http\Controllers\BranchController::class, 'update'])->name('admin.branch.update');

//admin ->company branch

Route::get('/admin/company/branches', [App\Http\Controllers\CompanyBranchController::class, 'index'])->name('admin.company.branch');
Route::get('/admin/company/branch/create', [App\Http\Controllers\CompanyBranchController::class, 'create'])->name('admin.company.branch.create');
Route::post('/admin/company/branch/save', [App\Http\Controllers\CompanyBranchController::class, 'store'])->name('admin.company.branch.save');
Route::get('/admin/company/branch/edit/{id}', [App\Http\Controllers\CompanyBranchController::class, 'edit'])->name('admin.company.branch.edit');
Route::get('/admin/company/branch/delete/{id}', [App\Http\Controllers\CompanyBranchController::class, 'destroy'])->name('admin.company.branch.delete');
Route::post('/admin/company/branch/update', [App\Http\Controllers\CompanyBranchController::class, 'update'])->name('admin.company.branch.update');

//admin ->driver
Route::get('/admin/drivers', [App\Http\Controllers\DriverController::class, 'index'])->name('admin.driver');
Route::get('/admin/driver/create', [App\Http\Controllers\DriverController::class, 'create'])->name('admin.driver.create');
Route::post('/admin/driver/save', [App\Http\Controllers\DriverController::class, 'store'])->name('admin.driver.save');
Route::get('/admin/driver/edit/{id}', [App\Http\Controllers\DriverController::class, 'edit'])->name('admin.driver.edit');
Route::get('/admin/driver/delete/{id}', [App\Http\Controllers\DriverController::class, 'destroy'])->name('admin.driver.delete');
Route::post('/admin/driver/update', [App\Http\Controllers\DriverController::class, 'update'])->name('admin.driver.update');

//admin ->customer
Route::get('/admin/customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('admin.customer');
Route::get('/admin/customer/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('admin.customer.create');
Route::post('/admin/customer/save', [App\Http\Controllers\CustomerController::class, 'store'])->name('admin.customer.save');
Route::get('/admin/customer/edit/{id}', [App\Http\Controllers\CustomerController::class, 'edit'])->name('admin.customer.edit');
Route::get('/admin/customer/delete/{id}', [App\Http\Controllers\CustomerController::class, 'destroy'])->name('admin.customer.delete');
Route::post('/admin/customer/update', [App\Http\Controllers\CustomerController::class, 'update'])->name('admin.customer.update');

Route::get('/admin/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('admin.order');
Route::get('/admin/order/create', [App\Http\Controllers\OrderController::class, 'create'])->name('admin.order.create');
Route::post('/admin/order/save', [App\Http\Controllers\OrderController::class, 'store'])->name('admin.order.save');
Route::get('/admin/order/edit/{id}', [App\Http\Controllers\OrderController::class, 'edit'])->name('admin.order.edit');
Route::get('/admin/order/delete/{id}', [App\Http\Controllers\OrderController::class, 'destroy'])->name('admin.order.delete');
Route::post('/admin/order/update', [App\Http\Controllers\OrderController::class, 'update'])->name('admin.order.update');

Route::get('/admin/scheduler', [App\Http\Controllers\OrderController::class, 'schedule'])->name('admin.scheduler');
Route::get('/admin/get-events', [App\Http\Controllers\OrderController::class, 'getEvents'])->name('admin.get-event');
Route::get('/admin/calendar-event/{id}', [App\Http\Controllers\OrderController::class, 'calendarEvent']);


//admin ->Data Master-fuel station
Route::get('/admin/fuels', [App\Http\Controllers\FuelController::class, 'index'])->name('admin.fuel');
Route::get('/admin/fuel/create', [App\Http\Controllers\FuelController::class, 'create'])->name('admin.fuel.create');
Route::post('/admin/fuel/save', [App\Http\Controllers\FuelController::class, 'store'])->name('admin.fuel.save');
Route::get('/admin/fuel/edit/{id}', [App\Http\Controllers\FuelController::class, 'edit'])->name('admin.fuel.edit');
Route::get('/admin/fuel/delete/{id}', [App\Http\Controllers\FuelController::class, 'destroy'])->name('admin.fuel.delete');
Route::post('/admin/fuel/update', [App\Http\Controllers\FuelController::class, 'update'])->name('admin.fuel.update');

//admin ->InsuranceCLaim
Route::get('/admin/insurance-claims', [App\Http\Controllers\InsuranceClaimController::class, 'index'])->name('admin.insurance.claim');
Route::get('/admin/insurance-claim/create', [App\Http\Controllers\InsuranceClaimController::class, 'create'])->name('admin.insurance.claim.create');
Route::post('/admin/insurance-claim/save', [App\Http\Controllers\InsuranceClaimController::class, 'store'])->name('admin.insurance.claim.save');
Route::get('/admin/insurance-claim/edit/{id}', [App\Http\Controllers\InsuranceClaimController::class, 'edit'])->name('admin.insurance.claim.edit');
Route::get('/admin/insurance-claim/delete/{id}', [App\Http\Controllers\InsuranceClaimController::class, 'destroy'])->name('admin.insurance.claim.delete');
Route::post('/admin/insurance-claim/update', [App\Http\Controllers\InsuranceClaimController::class, 'update'])->name('admin.insurance.claim.update');

//admin ->renewal-insurance
Route::get('/admin/renewal/insurance', [App\Http\Controllers\RenewalInsuranceController::class, 'index'])->name('admin.renewal.insurance');
Route::get('/admin/renewal/insurance/create', [App\Http\Controllers\RenewalInsuranceController::class, 'create'])->name('admin.renewal.insurance.create');
Route::post('/admin/renewal/insurance/save', [App\Http\Controllers\RenewalInsuranceController::class, 'store'])->name('admin.renewal.insurance.save');
Route::get('/admin/renewal/insurance/edit/{id}', [App\Http\Controllers\RenewalInsuranceController::class, 'edit'])->name('admin.renewal.insurance.edit');
Route::get('/admin/renewal/insurance/delete/{id}', [App\Http\Controllers\RenewalInsuranceController::class, 'destroy'])->name('admin.renewal.insurance.delete');
Route::post('/admin/renewal/insurance/update', [App\Http\Controllers\RenewalInsuranceController::class, 'update'])->name('admin.renewal.insurance.update');

//admin ->other renewal-
Route::get('/admin/renewal/other', [App\Http\Controllers\OtherRenewalController::class, 'index'])->name('admin.other.renewal');
Route::get('/admin/renewal/other/create', [App\Http\Controllers\OtherRenewalController::class, 'create'])->name('admin.other.renewal.create');
Route::post('/admin/renewal/other/save', [App\Http\Controllers\OtherRenewalController::class, 'store'])->name('admin.other.renewal.save');
Route::get('/admin/renewal/other/edit/{id}', [App\Http\Controllers\OtherRenewalController::class, 'edit'])->name('admin.other.renewal.edit');
Route::get('/admin/renewal/other/delete/{id}', [App\Http\Controllers\OtherRenewalController::class, 'destroy'])->name('admin.other.renewal.delete');
Route::post('/admin/renewal/other/update', [App\Http\Controllers\OtherRenewalController::class, 'update'])->name('admin.other.renewal.update');


//admin ->stock purchase
Route::get('/admin/stock/stock-purchase', [App\Http\Controllers\StockPurchaseController::class, 'index'])->name('admin.stock.stock-purchase');
Route::get('/admin/stock/stock-purchase/create', [App\Http\Controllers\StockPurchaseController::class, 'create'])->name('admin.stock.stock-purchase.create');
Route::get('/admin/stock/stock-purchase/getDetail/{id}', [App\Http\Controllers\StockPurchaseController::class, 'getDetail']);
Route::post('/admin/stock/stock-purchase/store', [App\Http\Controllers\StockPurchaseController::class, 'store'])->name('admin.stock.stock-purchase.store');
Route::get('/admin/stock/stock-purchase/delete/{id}', [App\Http\Controllers\StockPurchaseController::class, 'destroy'])->name('admin.stock.stock-purchase.delete');
Route::get('/admin/stock/stock-purchase/edit/{id}', [App\Http\Controllers\StockPurchaseController::class, 'edit'])->name('admin.stock.stock-purchase.edit');
Route::post('/admin/stock/stock-purchase/update', [App\Http\Controllers\StockPurchaseController::class, 'update'])->name('admin.stock.stock-purchase.update');


//users
Route::get('/user/profile', [App\Http\Controllers\HomeController::class, 'userProfile'])->name('user.profile');
Route::post('/user/profile/update', [App\Http\Controllers\HomeController::class, 'userProfileUpdate'])->name('user.profile-update');

//admin ->stock purchase
Route::get('/admin/service-rate', [App\Http\Controllers\ServiceController::class, 'index'])->name('admin.service.rate');
Route::get('/admin/service-rate/create', [App\Http\Controllers\ServiceController::class, 'create'])->name('admin.service.create');
Route::post('/admin/service-rate/save', [App\Http\Controllers\ServiceController::class, 'store'])->name('admin.service.store');
Route::get('/admin/service-rate/delete/{id}', [App\Http\Controllers\ServiceController::class, 'destroy'])->name('admin.service.delete');
Route::get('/admin/service-rate/edit/{id}', [App\Http\Controllers\ServiceController::class, 'edit'])->name('admin.service.edit');
Route::post('/admin/service-rate/update', [App\Http\Controllers\ServiceController::class, 'update'])->name('admin.service.update');

// Route::group(['prefix' => 'admin'],function(){

//     Route::group(['middleware' => 'admin.guest'],function(){
//         Route::get('/login', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//     });
//     Route::group(['middleware' => 'admin.auth'],function(){
    
//     });
// });
