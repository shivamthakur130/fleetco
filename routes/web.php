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

//users
Route::get('/user/profile', [App\Http\Controllers\HomeController::class, 'userProfile'])->name('user.profile');
Route::post('/user/profile/update', [App\Http\Controllers\HomeController::class, 'userProfileUpdate'])->name('user.profile-update');



// Route::group(['prefix' => 'admin'],function(){

//     Route::group(['middleware' => 'admin.guest'],function(){
//         Route::get('/login', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//     });
//     Route::group(['middleware' => 'admin.auth'],function(){
    
//     });
// });
