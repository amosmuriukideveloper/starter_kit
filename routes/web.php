<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\TendorController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TendersController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welco');
// });


Route::get('/', [AuthenticatedSessionController::class, 'create']);

Route::middleware(['auth'])->group(function () {
   
     Route::resource('products', ProductController::class);
     Route::resource('messages', MessagesController::class);
    Route::resource('tendor', TendersController::class);
   // Route::resource('supplier', SupplierController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::get('main-dashboard', [UserController::class,'dashboard'])->name('main-dashboard');
    Route::resource('permissions', PermissionController::class);
    Route::get('dashboard', function () { 
        $message = 'Good to see you again,  ' . Auth::user()->name;
        return redirect('main-dashboard')->with('success', $message);
    })->middleware(['verified'])->name('dashboard');
});
require __DIR__.'/auth.php';

